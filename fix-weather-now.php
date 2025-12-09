<?php

/**
 * Script untuk fix weather API sekarang juga!
 * Jalankan: php fix-weather-now.php YOUR_API_KEY
 */

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$apiKey = $argv[1] ?? null;

if (!$apiKey) {
    echo "❌ Error: API Key tidak diberikan\n";
    echo "Usage: php fix-weather-now.php YOUR_API_KEY\n";
    exit(1);
}

echo "🔧 FIXING WEATHER API NOW...\n";
echo "================================\n\n";

// 1. Test API Key
echo "1. Testing API Key...\n";
$testUrl = "https://api.openweathermap.org/data/2.5/weather?lat=-0.7893&lon=113.9213&units=metric&appid={$apiKey}&lang=id";
$ch = curl_init($testUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    echo "✅ API Key VALID!\n\n";
} else {
    $error = json_decode($response, true);
    echo "❌ API Key TIDAK VALID! HTTP Code: {$httpCode}\n";
    echo "   Error: " . ($error['message'] ?? $response) . "\n\n";

    if ($httpCode === 401) {
        echo "⚠️  KEMUNGKINAN PENYEBAB:\n";
        echo "   1. API key baru butuh 5-10 menit untuk aktif\n";
        echo "   2. Email belum diverifikasi (cek inbox/spam)\n";
        echo "   3. Akun belum diaktifkan penuh\n";
        echo "   4. API key salah atau sudah dihapus\n\n";
        echo "💡 SOLUSI:\n";
        echo "   1. Cek email untuk verifikasi\n";
        echo "   2. Tunggu 5-10 menit lalu test lagi\n";
        echo "   3. Buat API key baru di: https://home.openweathermap.org/api_keys\n";
        echo "   4. Pastikan status API key 'Active' (bukan 'Pending')\n\n";
    }

    echo "Lanjutkan update .env? (y/n): ";
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    if (trim($line) !== 'y') {
        echo "Dibatalkan.\n";
        exit(1);
    }
    fclose($handle);
}

// 2. Update .env file
echo "\n2. Updating .env file...\n";
$envFile = __DIR__ . '/.env';

if (!file_exists($envFile)) {
    echo "❌ File .env tidak ditemukan!\n";
    exit(1);
}

$envContent = file_get_contents($envFile);

// Check if OPENWEATHERMAP_API_KEY exists
if (preg_match('/^OPENWEATHERMAP_API_KEY=.*$/m', $envContent)) {
    // Replace existing
    $envContent = preg_replace('/^OPENWEATHERMAP_API_KEY=.*$/m', "OPENWEATHERMAP_API_KEY={$apiKey}", $envContent);
    echo "✅ Updated existing OPENWEATHERMAP_API_KEY\n";
} else {
    // Add new
    $envContent .= "\nOPENWEATHERMAP_API_KEY={$apiKey}\n";
    echo "✅ Added OPENWEATHERMAP_API_KEY\n";
}

file_put_contents($envFile, $envContent);
echo "✅ .env file updated!\n\n";

// 3. Clear all caches
echo "3. Clearing all caches...\n";
\Illuminate\Support\Facades\Artisan::call('config:clear');
\Illuminate\Support\Facades\Artisan::call('cache:clear');
\Illuminate\Support\Facades\Cache::flush();
echo "✅ All caches cleared!\n\n";

// 4. Clear weather-specific cache
echo "4. Clearing weather cache...\n";
$cache = \Illuminate\Support\Facades\Cache::getStore();
if (method_exists($cache, 'flush')) {
    $cache->flush();
}
echo "✅ Weather cache cleared!\n\n";

// 5. Test again with new config
echo "5. Testing with new configuration...\n";
sleep(2); // Wait a bit
$config = config('services.openweathermap.key');
if ($config === $apiKey) {
    echo "✅ Configuration loaded correctly!\n";
    echo "   API Key in config: " . substr($config, 0, 10) . "...\n\n";
} else {
    echo "⚠️  Warning: Config might need refresh\n";
    echo "   Expected: " . substr($apiKey, 0, 10) . "...\n";
    echo "   Got: " . ($config ? substr($config, 0, 10) . "..." : "NULL") . "\n\n";
}

echo "================================\n";
echo "✅ FIX COMPLETE!\n\n";
echo "📝 NEXT STEPS:\n";
echo "   1. Refresh halaman destinasi di browser\n";
echo "   2. Jika masih error, tunggu 5-10 menit (API key baru perlu waktu aktif)\n";
echo "   3. Cek log: tail -f storage/logs/laravel.log\n";
echo "   4. Test API: php test-weather-api.php {$apiKey}\n\n";

