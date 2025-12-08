# Konfigurasi OpenWeatherMap API

## Langkah-langkah Setup

### 1. Dapatkan API Key dari OpenWeatherMap

1. Kunjungi https://openweathermap.org/api
2. Daftar atau login ke akun Anda
3. Buka halaman API Keys: https://home.openweathermap.org/api_keys
4. Buat API key baru atau gunakan yang sudah ada
5. Salin API key Anda

### 2. Konfigurasi di File .env

Tambahkan atau edit baris berikut di file `.env` di root project:

```env
OPENWEATHERMAP_API_KEY=your_api_key_here
OPENWEATHERMAP_API_URL=https://api.openweathermap.org/data/2.5
OPENWEATHERMAP_CACHE_MINUTES=60
```

**Catatan:** Ganti `your_api_key_here` dengan API key yang Anda dapatkan dari OpenWeatherMap.

### 3. Clear Cache (Jika Perlu)

Setelah mengubah konfigurasi, jalankan perintah berikut:

```bash
php artisan config:clear
php artisan cache:clear
```

### 4. Verifikasi Konfigurasi

Untuk memverifikasi bahwa API key sudah dikonfigurasi dengan benar, Anda dapat:

1. Cek file `config/services.php` - pastikan konfigurasi OpenWeatherMap ada
2. Cek log Laravel di `storage/logs/laravel.log` jika ada error terkait API
3. Coba akses halaman detail destinasi dan lihat apakah data cuaca muncul

## Troubleshooting

### Data cuaca tidak muncul

1. **Cek API Key:**
   - Pastikan API key sudah ditambahkan di file `.env`
   - Pastikan tidak ada spasi atau karakter tambahan
   - Pastikan API key masih aktif di OpenWeatherMap

2. **Cek Log:**
   - Buka file `storage/logs/laravel.log`
   - Cari error terkait "OpenWeatherMap" atau "Weather API"
   - Error umum:
     - `401 Unauthorized` - API key tidak valid
     - `429 Too Many Requests` - Rate limit terlampaui
     - `Connection timeout` - Masalah koneksi internet

3. **Cek Koordinat Destinasi:**
   - Pastikan destinasi memiliki koordinat (latitude dan longitude) yang valid
   - Koordinat harus dalam format angka desimal

4. **Clear Cache:**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

### Rate Limit

Jika Anda menggunakan paket free dari OpenWeatherMap:
- 60 calls per menit
- 1,000,000 calls per bulan

Jika rate limit terlampaui, tunggu beberapa saat atau upgrade ke paket berbayar.

## Testing

Untuk menguji apakah API key berfungsi, Anda dapat menggunakan curl:

```bash
curl "https://api.openweathermap.org/data/2.5/weather?lat=-0.7893&lon=113.9213&units=metric&appid=YOUR_API_KEY&lang=id"
```

Ganti `YOUR_API_KEY` dengan API key Anda dan koordinat dengan koordinat yang valid.

