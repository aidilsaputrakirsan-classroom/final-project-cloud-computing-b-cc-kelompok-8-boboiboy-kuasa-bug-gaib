<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\WeatherService;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }
    public function update(Request $request, \App\Models\Itinerary $itinerary)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $itinerary->update($validated);

        return redirect()->route('user.itinerary.index')->with('success', 'Rencana perjalanan berhasil diubah!');
    }
    public function edit(\App\Models\Itinerary $itinerary)
    {
        return view('user.itinerary.edit', compact('itinerary'));
    }
    public function destroy(\App\Models\Itinerary $itinerary)
    {
        $itinerary->delete();
        return redirect()->route('user.itinerary.index')->with('success', 'Rencana perjalanan berhasil dihapus!');
    }
    public function show(\App\Models\Itinerary $itinerary)
    {
        // Load itinerary destinations with destination relationship
        $itinerary->load('itineraryDestinations.destination');

        // Get weather data for each destination
        $weatherData = $this->getWeatherDataForItinerary($itinerary);

        // Tampilkan detail itinerary
        return view('user.itinerary.show', compact('itinerary', 'weatherData'));
    }

    /**
     * Get weather data for all destinations in the itinerary
     *
     * @param \App\Models\Itinerary $itinerary
     * @return array
     */
    private function getWeatherDataForItinerary(\App\Models\Itinerary $itinerary): array
    {
        $weatherData = [];

        foreach ($itinerary->itineraryDestinations as $itineraryDestination) {
            // Skip if destination doesn't exist or doesn't have coordinates
            if (!$itineraryDestination->destination ||
                !$itineraryDestination->destination->latitude ||
                !$itineraryDestination->destination->longitude) {
                continue;
            }

            $lat = $itineraryDestination->destination->latitude;
            $lng = $itineraryDestination->destination->longitude;

            // Get visit date time or use current date
            $visitDateTime = $itineraryDestination->visit_date_time
                ? \Carbon\Carbon::parse($itineraryDestination->visit_date_time)
                : \Carbon\Carbon::now();

            // Get forecast data
            $forecast = $this->weatherService->getForecast($lat, $lng, 5, 'metric');

            if ($forecast && isset($forecast['list']) && !empty($forecast['list'])) {
                // Find the closest forecast to the visit date/time
                $closestForecast = $this->findClosestForecast($forecast['list'], $visitDateTime);

                if ($closestForecast) {
                    $weatherData[$itineraryDestination->id] = [
                        'forecast_time' => \Carbon\Carbon::parse($closestForecast['dt_txt'])->format('d M Y, H:i'),
                        'icon' => $closestForecast['weather'][0]['icon'],
                        'description' => $closestForecast['weather'][0]['description'],
                        'temperature' => round($closestForecast['main']['temp']),
                        'feels_like' => round($closestForecast['main']['feels_like']),
                        'humidity' => $closestForecast['main']['humidity'],
                        'wind_speed_kmh' => round($closestForecast['wind']['speed'] * 3.6), // Convert m/s to km/h
                        'city' => $itineraryDestination->destination->place_name ?? null,
                    ];
                } else {
                    // Fallback to current weather if forecast not found
                    $currentWeather = $this->weatherService->getCurrentWeather($lat, $lng, 'metric');
                    if ($currentWeather) {
                        $weatherData[$itineraryDestination->id] = [
                            'forecast_time' => 'Saat ini',
                            'icon' => $currentWeather['weather'][0]['icon'],
                            'description' => $currentWeather['weather'][0]['description'],
                            'temperature' => round($currentWeather['main']['temp']),
                            'feels_like' => round($currentWeather['main']['feels_like']),
                            'humidity' => $currentWeather['main']['humidity'],
                            'wind_speed_kmh' => round($currentWeather['wind']['speed'] * 3.6),
                            'city' => $itineraryDestination->destination->place_name ?? null,
                        ];
                    }
                }
            } else {
                // Fallback to current weather if forecast fails
                $currentWeather = $this->weatherService->getCurrentWeather($lat, $lng, 'metric');
                if ($currentWeather) {
                    $weatherData[$itineraryDestination->id] = [
                        'forecast_time' => 'Saat ini',
                        'icon' => $currentWeather['weather'][0]['icon'],
                        'description' => $currentWeather['weather'][0]['description'],
                        'temperature' => round($currentWeather['main']['temp']),
                        'feels_like' => round($currentWeather['main']['feels_like']),
                        'humidity' => $currentWeather['main']['humidity'],
                        'wind_speed_kmh' => round($currentWeather['wind']['speed'] * 3.6),
                        'city' => $itineraryDestination->destination->place_name ?? null,
                    ];
                }
            }
        }

        return $weatherData;
    }

    /**
     * Find the closest forecast entry to the visit date/time
     *
     * @param array $forecastList
     * @param \Carbon\Carbon $visitDateTime
     * @return array|null
     */
    private function findClosestForecast(array $forecastList, \Carbon\Carbon $visitDateTime): ?array
    {
        if (empty($forecastList)) {
            return null;
        }

        $closest = null;
        $minDiff = PHP_INT_MAX;

        foreach ($forecastList as $forecast) {
            $forecastTime = \Carbon\Carbon::parse($forecast['dt_txt']);
            $diff = abs($visitDateTime->diffInMinutes($forecastTime));

            // Find the forecast with the smallest time difference
            // Accept forecasts within 6 hours of the visit time (before or after)
            if ($diff <= 360 && $diff < $minDiff) {
                $minDiff = $diff;
                $closest = $forecast;
            }
        }

        // If no forecast found within 6 hours, find the closest one overall
        if (!$closest) {
            foreach ($forecastList as $forecast) {
                $forecastTime = \Carbon\Carbon::parse($forecast['dt_txt']);
                $diff = abs($visitDateTime->diffInMinutes($forecastTime));

                if ($diff < $minDiff) {
                    $minDiff = $diff;
                    $closest = $forecast;
                }
            }
        }

        // If still no match (shouldn't happen), use the first forecast
        if (!$closest && !empty($forecastList)) {
            $closest = $forecastList[0];
        }

        return $closest;
    }
    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Simpan data itinerary baru
        $itinerary = \App\Models\Itinerary::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'status' => 'draft',
        ]);

        // Redirect ke halaman daftar itinerary dengan pesan sukses
        return redirect()->route('user.itinerary.index')->with('success', 'Rencana perjalanan berhasil dibuat!');
    }

    public function index(Request $request)
    {
        $query = \App\Models\Itinerary::where('user_id', auth()->id());

        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%");
        }

        // Filter status
        $now = now()->toDateString();
        if ($request->filled('status')) {
            $status = $request->input('status');
            if ($status === 'ongoing') {
                $query->where('start_date', '<=', $now)->where('end_date', '>=', $now);
            } elseif ($status === 'completed') {
                $query->where('end_date', '<', $now);
            } elseif ($status === 'draft') {
                $query->where('start_date', '>', $now);
            }
        }

        // Sort
        if ($request->filled('sort')) {
            $sort = $request->input('sort');
            if ($sort === 'newest') {
                $query->orderByDesc('start_date');
            } elseif ($sort === 'oldest') {
                $query->orderBy('start_date');
            } elseif ($sort === 'title_asc') {
                $query->orderBy('title');
            } elseif ($sort === 'title_desc') {
                $query->orderByDesc('title');
            }
        }

        $itineraries = $query->paginate(9);

        // Statistik
        $allItineraries = \App\Models\Itinerary::where('user_id', auth()->id())->get();
        $total = $allItineraries->count();
        $ongoing = $allItineraries->filter(function($item) use ($now) {
            return $item->start_date <= $now && $item->end_date >= $now;
        })->count();
        $completed = $allItineraries->filter(function($item) use ($now) {
            return $item->end_date < $now;
        })->count();

        $itineraryStats = [
            'total' => $total,
            'ongoing' => $ongoing,
            'completed' => $completed,
        ];

        return view('user.itinerary.index', compact('itineraries', 'itineraryStats'));
    }

    public function create()
    {
        // Tampilkan halaman form pembuatan itinerary
        return view('user.itinerary.create');
    }
}
