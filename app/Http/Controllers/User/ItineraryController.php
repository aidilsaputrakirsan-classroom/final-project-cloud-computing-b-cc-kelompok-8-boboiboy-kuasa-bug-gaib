<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
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

    public function index()
    {
        // Ambil semua itinerary milik user yang sedang login
        $itineraries = \App\Models\Itinerary::where('user_id', auth()->id())->paginate(9);
        return view('user.itinerary.index', compact('itineraries'));
    }

    public function create()
    {
        // Tampilkan halaman form pembuatan itinerary
        return view('user.itinerary.create');
    }
}
