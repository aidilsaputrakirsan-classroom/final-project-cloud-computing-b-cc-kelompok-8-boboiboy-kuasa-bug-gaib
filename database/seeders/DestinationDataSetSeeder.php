<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class DestinationDataSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = base_path('app/Data/destinasi-wisata-kalimantan-timur.csv');

        if (!file_exists($path)) {
            dd("File tidak ditemukan di path: " . $path);
        }

        $rows = array_map('str_getcsv', file($path));
        $header = array_map('trim', $rows[0]);
        $data = array_slice($rows, 1);

        // Definisi batas koordinat untuk wilayah Kalimantan Timur
        $kalimantanTimurBounds = [
            'lat_min' => -2.0000,   // Batas selatan (Berau bagian selatan)
            'lat_max' => 4.0000,    // Batas utara (Tarakan, Nunukan)
            'lng_min' => 115.0000,  // Batas barat (Mahakam Ulu)
            'lng_max' => 119.0000   // Batas timur (Pulau Derawan)
        ];

        $addedCount = 0;
        $skippedCount = 0;

        foreach ($data as $row) {
            $record = array_combine($header, $row);

            if (empty($record['nama']) || empty($record['kategori'])) {
                $skippedCount++;
                continue;
            }

            // Ambil koordinat dari format dataset
            $latitude = floatval($record['lat']);
            $longitude = floatval($record['lng']);

            // Cek apakah koordinat berada dalam area Kalimantan Timur
            $isInKaltim = $this->isWithinBounds($latitude, $longitude, $kalimantanTimurBounds);

            if (!$isInKaltim) {
                $skippedCount++;
                continue;
            }

            // Tentukan kota/kabupaten berdasarkan koordinat
            $city = $this->determineCityByCoordinates($latitude, $longitude);

            // Buat kategori jika belum ada
            $category = Category::firstOrCreate([
                'name' => trim($record['kategori'])
            ]);

            // Konversi rating dari skala 1-50 menjadi 0-10 untuk database
            $rawRating = floatval($record['rating']);
            $rating = min(10, ($rawRating / 5)); // Konversi skala 1-50 menjadi 0-10
            if ($rating < 0) $rating = 0;
            if ($rating > 10) $rating = 10; // Batas maksimal 10

            // Konversi harga tiket
            $ticketPrice = floatval($record['harga_tiket']);

            // Konversi durasi (dalam menit)
            $duration = intval($record['durasi']);
            if ($duration < 0) $duration = 0;

            try {
                Destination::create([
                    'created_by' => 1,
                    'category_id' => $category->id,
                    'place_name' => $record['nama'],
                    'slug' => Str::slug($record['nama'] . ' ' . $city),
                    'description' => $record['deskripsi'],
                    'administrative_area' => $city,
                    'province' => 'Kalimantan Timur',
                    'ticket_price' => $ticketPrice,
                    'rating' => $rating,
                    'rating_count' => 100, // Default value
                    'time_minutes' => $duration,
                    'best_visit_time' => null,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                ]);

                $this->command->info("Added ({$city}): {$record['nama']} - Price: Rp " . number_format($ticketPrice, 0, ',', '.'));
                $addedCount++;
            } catch (QueryException $e) {
                $this->command->error("Error adding {$record['nama']}: {$e->getMessage()}");

                // Coba lagi dengan nilai default yang aman
                try {
                    Destination::create([
                        'created_by' => 1,
                        'category_id' => $category->id,
                        'place_name' => $record['nama'],
                        'slug' => Str::slug($record['nama'] . ' ' . $city),
                        'description' => $record['deskripsi'],
                        'administrative_area' => $city,
                        'province' => 'Kalimantan Timur',
                        'ticket_price' => $ticketPrice,
                        'rating' => 7.5, // Default rating
                        'rating_count' => 100,
                        'time_minutes' => $duration,
                        'best_visit_time' => null,
                        'latitude' => $latitude,
                        'longitude' => $longitude,
                    ]);

                    $this->command->info("Added with default rating ({$city}): {$record['nama']}");
                    $addedCount++;
                } catch (QueryException $e2) {
                    $this->command->error("Failed to add {$record['nama']} with default values");
                    $skippedCount++;
                }
            }
        }

        $this->command->info("=== SEEDING COMPLETED ===");
        $this->command->info("Total destinations added: {$addedCount}");
        $this->command->info("Total destinations skipped: {$skippedCount}");
    }

    /**
     * Cek apakah koordinat berada dalam batas area tertentu
     */
    private function isWithinBounds($latitude, $longitude, $bounds)
    {
        return $latitude >= $bounds['lat_min'] &&
            $latitude <= $bounds['lat_max'] &&
            $longitude >= $bounds['lng_min'] &&
            $longitude <= $bounds['lng_max'];
    }

    /**
     * Tentukan kota/kabupaten berdasarkan koordinat untuk Kalimantan Timur
     */
    private function determineCityByCoordinates($latitude, $longitude)
    {
        $cities = [
            'Balikpapan' => [
                'lat_min' => -1.3500, 'lat_max' => -1.1000,
                'lng_min' => 116.7500, 'lng_max' => 117.0000
            ],
            'Samarinda' => [
                'lat_min' => -0.6000, 'lat_max' => -0.4000,
                'lng_min' => 117.1000, 'lng_max' => 117.2000
            ],
            'Berau' => [
                'lat_min' => 1.5000, 'lat_max' => 2.5000,
                'lng_min' => 117.0000, 'lng_max' => 119.0000
            ],
            'Bontang' => [
                'lat_min' => 0.1000, 'lat_max' => 0.2000,
                'lng_min' => 117.4000, 'lng_max' => 117.5000
            ],
            'Tenggarong' => [
                'lat_min' => -0.4500, 'lat_max' => -0.4000,
                'lng_min' => 116.9500, 'lng_max' => 117.0000
            ],
            'Kutai Kartanegara' => [
                'lat_min' => -0.5000, 'lat_max' => 0.0000,
                'lng_min' => 116.5000, 'lng_max' => 117.5000
            ],
            'Kutai Barat' => [
                'lat_min' => -0.5000, 'lat_max' => 0.5000,
                'lng_min' => 115.5000, 'lng_max' => 116.5000
            ],
            'Tarakan' => [
                'lat_min' => 3.2000, 'lat_max' => 3.4000,
                'lng_min' => 117.5000, 'lng_max' => 117.7000
            ],
            'Penajam Paser Utara' => [
                'lat_min' => -1.5000, 'lat_max' => -1.2000,
                'lng_min' => 116.4000, 'lng_max' => 116.7000
            ],
        ];

        foreach ($cities as $city => $bounds) {
            if (
                $latitude >= $bounds['lat_min'] && $latitude <= $bounds['lat_max'] &&
                $longitude >= $bounds['lng_min'] && $longitude <= $bounds['lng_max']
            ) {
                return $city;
            }
        }

        return 'Kalimantan Timur';
    }
}