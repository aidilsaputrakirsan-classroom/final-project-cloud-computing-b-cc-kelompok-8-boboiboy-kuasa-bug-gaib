<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ItinerarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itineraries = [
            [
                'user_id' => 2, // Budi
                'title' => 'Liburan Bukit Kebo 3 Hari',
                'slug' => 'liburan-bukit-3-hari',
                'start_date' => '2025-05-01',
                'end_date' => '2025-05-03',
                'status' => 'ongoing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3, // Siti
                'title' => 'Wisata Kalimantan Timur',
                'slug' => 'wisata-kalimantan-timur',
                'start_date' => '2025-06-15',
                'end_date' => '2025-06-20',
                'status' => 'ongoing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 4, // Ahmad
                'title' => 'Trip Berau',
                'slug' => 'trip-berau',
                'start_date' => '2024-12-10',
                'end_date' => '2024-12-15',
                'status' => 'completed',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('itineraries')->insert($itineraries);
    }
}
