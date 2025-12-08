<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    protected $apiKey;
    protected $baseUrl;
    protected $cacheTime;

    public function __construct()
    {
        $this->apiKey = config('services.openweathermap.key');
        $this->baseUrl = config('services.openweathermap.url', 'https://api.openweathermap.org/data/2.5');
        $this->cacheTime = config('services.openweathermap.cache_minutes', 60); // Cache time in minutes
    }

    /**
     * Mendapatkan cuaca saat ini berdasarkan koordinat
     *
     * @param float $lat Garis Lintang
     * @param float $lng Garis Bujur
     * @param string $units Format satuan (metric, imperial, standard)
     * @return array|null Data cuaca atau null jika gagal
     */
    public function getCurrentWeather($lat, $lng, $units = 'metric')
    {
        if (empty($this->apiKey)) {
            Log::error('OpenWeatherMap API key is missing.');
            return null;
        }

        // Input validation
        if (!is_numeric($lat) || !is_numeric($lng)) {
            Log::error('Invalid coordinates provided', ['lat' => $lat, 'lng' => $lng]);
            return null;
        }

        $cacheKey = "weather_current_{$lat}_{$lng}_{$units}";

        // Don't cache error responses, only cache successful responses
        $cached = Cache::get($cacheKey);
        if ($cached !== null) {
            return $cached;
        }

        try {
            $response = Http::timeout(10)->get("{$this->baseUrl}/weather", [
                'lat' => $lat,
                'lon' => $lng,
                'units' => $units,
                'appid' => $this->apiKey,
                'lang' => 'id', // Indonesian language
            ]);

            if ($response->successful()) {
                $data = $response->json();
                // Validate response structure
                if (isset($data['main']) && isset($data['weather']) && isset($data['weather'][0])) {
                    // Only cache successful responses
                    Cache::put($cacheKey, $data, $this->cacheTime * 60);
                    return $data;
                } else {
                    Log::warning('Weather API returned invalid data structure', ['data' => $data]);
                    return null;
                }
            }

            // Handle specific error codes - DON'T CACHE ERRORS
            $statusCode = $response->status();
            $errorBody = $response->json();

            if ($statusCode === 401) {
                Log::error('OpenWeatherMap API: Invalid API key', [
                    'status' => $statusCode,
                    'response' => $errorBody,
                    'api_key_preview' => substr($this->apiKey, 0, 10) . '...'
                ]);
            } elseif ($statusCode === 429) {
                Log::error('OpenWeatherMap API: Rate limit exceeded', [
                    'status' => $statusCode,
                    'response' => $errorBody
                ]);
            } else {
                Log::error('Weather API error', [
                    'status' => $statusCode,
                    'response' => $response->body()
                ]);
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Weather API connection error', [
                'message' => $e->getMessage(),
                'lat' => $lat,
                'lng' => $lng
            ]);
        } catch (\Exception $e) {
            Log::error('Weather API exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }

        return null;
    }

    /**
     * Mendapatkan prakiraan cuaca berdasarkan koordinat
     *
     * @param float $lat Garis Lintang
     * @param float $lng Garis Bujur
     * @param int $hari Jumlah hari untuk prakiraan (maksimal 5)
     * @param string $units Format satuan (metric, imperial, standard)
     * @return array|null Data prakiraan atau null jika gagal
     */
    public function getForecast($lat, $lng, $days = 5, $units = 'metric')
    {
        if (empty($this->apiKey)) {
            Log::error('OpenWeatherMap API key is missing.');
            return null;
        }

        // Input validation
        if (!is_numeric($lat) || !is_numeric($lng)) {
            Log::error('Invalid coordinates provided', ['lat' => $lat, 'lng' => $lng]);
            return null;
        }

        // Ensure days is within valid range (1-5)
        $days = max(1, min(5, (int)$days));

        $cacheKey = "weather_forecast_{$lat}_{$lng}_{$days}_{$units}";

        // Don't cache error responses, only cache successful responses
        $cached = Cache::get($cacheKey);
        if ($cached !== null) {
            return $cached;
        }

        try {
            $response = Http::timeout(10)->get("{$this->baseUrl}/forecast", [
                'lat' => $lat,
                'lon' => $lng,
                'units' => $units,
                'appid' => $this->apiKey,
                'cnt' => $days * 8, // 8 forecasts per day (3-hour intervals)
                'lang' => 'id', // Indonesian language
            ]);

            if ($response->successful()) {
                $data = $response->json();
                // Validate response structure
                if (isset($data['list']) && is_array($data['list']) && !empty($data['list'])) {
                    // Only cache successful responses
                    Cache::put($cacheKey, $data, $this->cacheTime * 60);
                    return $data;
                } else {
                    Log::warning('Weather forecast API returned invalid data structure', ['data' => $data]);
                    return null;
                }
            }

            // Handle specific error codes - DON'T CACHE ERRORS
            $statusCode = $response->status();
            $errorBody = $response->json();

            if ($statusCode === 401) {
                Log::error('OpenWeatherMap Forecast API: Invalid API key', [
                    'status' => $statusCode,
                    'response' => $errorBody,
                    'api_key_preview' => substr($this->apiKey, 0, 10) . '...'
                ]);
            } elseif ($statusCode === 429) {
                Log::error('OpenWeatherMap Forecast API: Rate limit exceeded', [
                    'status' => $statusCode,
                    'response' => $errorBody
                ]);
            } else {
                Log::error('Weather forecast API error', [
                    'status' => $statusCode,
                    'response' => $response->body()
                ]);
            }
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Weather forecast API connection error', [
                'message' => $e->getMessage(),
                'lat' => $lat,
                'lng' => $lng
            ]);
        } catch (\Exception $e) {
            Log::error('Weather forecast API exception', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }

        return null;
    }

    /**
     * Mendapatkan URL ikon cuaca
     *
     * @param string $kodeIkon Kode ikon dari data cuaca
     * @return string URL lengkap ke ikon cuaca
     */
    public function getWeatherIconUrl($iconCode)
    {
        if (empty($iconCode)) {
            return '';
        }

        return "https://openweathermap.org/img/wn/{$iconCode}@2x.png";
    }
}
