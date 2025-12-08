<?php

/**
 * Script untuk test OpenWeatherMap API Key
 * Jalankan: php test-weather-api.php YOUR_API_KEY
 */

$apiKey = $argv[1] ?? null;

if (!$apiKey) {
    echo "❌ Error: API Key tidak diberikan\n";
    echo "Usage: php test-weather-api.php YOUR_API_KEY\n";
    exit(1);
}

echo "🔍 Testing OpenWeatherMap API Key...\n";
echo "API Key: " . substr($apiKey, 0, 10) . "...\n\n";

// Test coordinates (Samarinda, Kalimantan Timur)
$lat = -0.7893;
$lng = 113.9213;

// Test Current Weather API
echo "1. Testing Current Weather API...\n";
$url = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lng}&units=metric&appid={$apiKey}&lang=id";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    $data = json_decode($response, true);
    echo "✅ SUCCESS! Current Weather API berfungsi\n";
    echo "   Location: " . ($data['name'] ?? 'N/A') . "\n";
    echo "   Temperature: " . ($data['main']['temp'] ?? 'N/A') . "°C\n";
    echo "   Weather: " . ($data['weather'][0]['description'] ?? 'N/A') . "\n\n";
} else {
    $error = json_decode($response, true);
    echo "❌ FAILED! HTTP Code: {$httpCode}\n";
    echo "   Error: " . ($error['message'] ?? $response) . "\n\n";
    
    if ($httpCode === 401) {
        echo "💡 Solusi:\n";
        echo "   1. API key tidak valid atau sudah expired\n";
        echo "   2. Dapatkan API key baru di: https://home.openweathermap.org/api_keys\n";
        echo "   3. Pastikan API key sudah diaktifkan (bisa butuh beberapa menit)\n";
    }
    exit(1);
}

// Test Forecast API
echo "2. Testing Forecast API...\n";
$url = "https://api.openweathermap.org/data/2.5/forecast?lat={$lat}&lon={$lng}&units=metric&appid={$apiKey}&cnt=5&lang=id";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    $data = json_decode($response, true);
    echo "✅ SUCCESS! Forecast API berfungsi\n";
    echo "   Forecast items: " . count($data['list'] ?? []) . "\n\n";
} else {
    $error = json_decode($response, true);
    echo "❌ FAILED! HTTP Code: {$httpCode}\n";
    echo "   Error: " . ($error['message'] ?? $response) . "\n\n";
    exit(1);
}

echo "✅✅✅ SEMUA TEST BERHASIL! API Key valid dan siap digunakan.\n";
echo "\n📝 Langkah selanjutnya:\n";
echo "   1. Update file .env dengan API key ini:\n";
echo "      OPENWEATHERMAP_API_KEY={$apiKey}\n";
echo "   2. Clear cache: php artisan config:clear && php artisan cache:clear\n";
echo "   3. Refresh halaman destinasi\n";

