<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
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
        // Tampilkan detail itinerary
        return view('user.itinerary.show', compact('itinerary'));
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
