# Nusatarawisata-Kaltim - Sistem Informasi Perencanaan Wisata Kalimantan Timur

![Laravel](https://img.shields.io/badge/Laravel-12.0-FF2D20?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php&logoColor=white)

Nusatarawisata-Kaltim adalah sebuah aplikasi web berbasis Laravel untuk yang digunakan sebagai Media untuk mengumpulkan informasi terkait wisata yang ada di Kalimantan Timur. Aplikasi ini dapat memberikan akses informasi destinasi wisata, merencanakan perjalanan wisata dan mengelola keseluruhan data destinasi wisata yang ada di Kalimatan Timur. 

## Daftar Isi

- [Fitur Utama](#fitur-utama)
- [Tech Stack](#tech-stack)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Role & Permissions](#role--permissions)
- [Fitur Berdasarkan Role](#fitur-berdasarkan-role)
- [Screenshot](#screenshot)
- [Struktur Database](#struktur-database)
- [Penggunaan](#penggunaan)
- [Deployment](#deployment)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

## Fitur Utama

### Halaman Admin
- ✅ **Dashboard** - Menampilkan data yang ada pada sistem dalam bentuk statistik
- ✅ **Kelola Pengguna** - CRUD untuk akun Pengguna yang digunakan pada sistem dan disertakan pencarian/filter
- ✅ **Kelola Destinasi** - CRUD untuk Destinasi Wisata yang ditampilkan pada halaman Destinasi dan disertakan pencarian/filter
- ✅ **Pengajuan Destinasi** - Melihat Pengajuan Destinasi yang dimasukkan pengguna 
- ✅ **Kelola Kategori** - CRUD untuk Kategori yang digunakan untuk mengelompokkan Kategori dan disertakan pencarian/filter
- ✅ **Activity Log** - Menampilkan history dari Akun yang melakukan Login dan Logout pada sistem.

### Halaman Utama
- ✅ **Beranda** - Menampilkan Informasi umum terkait sistem dan FAQ
- ✅ **Destinasi** - Menampilkan daftar destinasi yang ada pada Kalimatan Timur, tersedia fitur pencarian/filter
- ✅ **Rencana Perjalanan** - CRUD untuk Rencana Perjalanan dan disertakan pencarian/filter
- ✅ **Register** - Membuat akun untuk sistem
- ✅ **Login** - Masuk akun dengan hak akses

## Tech Stack
### Backend
- **Laravel 12.0** - PHP Framework
- **PostgreSQL (Supabase)** - Database

### Frontend  
- **HTML5** - Markup language untuk struktur web
- **Tailwind CSS** - Utility-first CSS framework untuk styling yang efisien

### Tools & Development
- **Composer** - Dependency manager untuk PHP
- **NPM** - Package manager untuk JavaScript
- **Git** - Version control system

## Persyaratan Sistem

- PHP >= 8.2
- PostgreSQL (Supabase)
- Composer
- Node.js & NPM
- Web Server (Apache/Nginx)
- Extension PHP yang dibutuhkan:
  - openssl
  - pdo
  - pdo_pgsql
  - mbstring
  - tokenizer
  - ctype
  - json
  - fileinfo
  - curl
  - xml
  - gd / imagick

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/nusatarawisata-kaltim.git
cd nusatarawisata-kaltim
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Setup Environment

```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env` dan sesuaikan konfigurasi database:

```env
APP_KEY=base64:G+Z7R12QygCF4kgGe22wUmgdG3CPtKzu7GrawgQw44c=

DB_CONNECTION=pgsql
DB_URL=postgresql://postgres.hromnfbnrwofzdefwiim:PI8cfI9seGL4mP2X@aws-1-ap-southeast-1.pooler.supabase.com:6543/postgres
```

### 5. Migrasi Database

```bash
# Jalankan migrasi dan seeder
php artisan migrate --seed

# Atau jika ingin fresh install
php artisan migrate:fresh --seed
```

### 6. Setup Storage

```bash
# Create symbolic link untuk storage
php artisan storage:link
```

### 7. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Jalankan Aplikasi

```bash
# Development server
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## Role & Permissions

Sistem menggunakan 2 role utama dengan permission berbeda:

| Role | Deskripsi |
|------|-----------|
| **Admin** | Admin  |
| **Pengguna** | Pengguna Umum |

## Fitur Berdasarkan Role

### Admin
- ✅ Mengelola (CRUD) data Destinasi
- ✅ Mengelola (CRUD) data Pengguna
- ✅ Mengelola (CRUD) data Kategori
- ✅ Melihat data Pengajuan Destinasi
- ✅ Melihat data Activity Log
- ✅ Melihat data pada Dashboard
- ✅ Melakukan Login dan Registrasi Akun

### Pengguna Umum
- ✅ Melihat informasi terkait sistem
- ✅ Melihat informasi terkait destinasi
- ✅ Melakukan CRUD untuk rencana perjalanan
- ✅ Melakukan Login dan Registrasi Akun

## Screenshot

### 1. Halaman Login
![Halaman Login](public/images/screenshots/01-G.jpeg)
*Halaman login dengan form email dan password*

### 2. Halaman Register
![Halaman Register](public/images/screenshots/01-F.jpeg)
*Halaman register membuat akun baru*

### 3. Halaman Dashboard Admin
![Halaman Dashboard](public/images/screenshots/01-H.jpeg)
*Halaman Dashboard untuk melihat data dalam statistik*

### 4. Halaman Kelola Pengguna
![Halaman Kelola Pengguna](public/images/screenshots/01-I.jpeg)
*Halaman untuk mengelola data pengguna*

### 5. Halaman Kelola Destinasi
![Halaman Kelola Destinasi](public/images/screenshots/01-J.jpeg)
*Halaman untuk mengelola data Destinasi*

### 6. Halaman Pengajuan Destinasi
![Halaman Pengajuan Destinasi](public/images/screenshots/01-K.jpeg)
*Halaman untuk melihat data pengajuan destinasi*

### 7. Halaman Kelola Kategori
![Halaman Kelola Kategori](public/images/screenshots/01-L.jpeg)
*Halaman untuk mengelola data kategori*

### 8. Halaman Activity Log
![Halaman Activity Log](public/images/screenshots/01-M.jpeg)
*Halaman untuk melihat data activity log*

### 9. Halaman Beranda
![Halaman Beranda](public/images/screenshots/01-A.jpeg)
![Halaman Beranda](public/images/screenshots/01-B.jpeg)
![Halaman Beranda](public/images/screenshots/01-C.jpeg)
![Halaman Beranda](public/images/screenshots/01-D.jpeg)
*Halaman untuk melihat informasi sistem*

### 10. Halaman Destinasi
![Halaman Destinasi](public/images/screenshots/01-E.jpeg)
*Halaman untuk melihat informasi Destinasi*

### 11. Halaman Rencana Perjalanan
![Halaman Rencana Perjalanan](public/images/screenshots/01-N.jpeg)
*Halaman untuk membuat rencana perjalanan*

## Struktur Database

### Tabel Utama

- **users** - Data pengguna (profile dan hak akses)
- **destinasi** - Data destinasi wisata (nama tempat, lokasi, deskripsi, dll)
- **kategori** - Data ketegori untuk destinasi
- **rencana_perjalanan** - Rencana perjalanan pengguna (judul, tanggal, destinasi terkait)
- **activity_log** - Catatan login/logout
- **submissions** - Pengajuan destinasi baru oleh pengguna
- **reviews** - Review & rating destinasi oleh pengguna

### Relasi Database

```
users (1) ─── (n) travel_plans
users (1) ─── (n) submissions
users (1) ─── (n) reviews
categories (1) ─── (n) destinations
destinations (1) ─── (n) reviews
```

### Database
![Struktur Database](public/images/screenshots/01-O.jpeg)
*Struktur database*

## Arsitektur & Komponen

### Arsitektur Aplikasi

Aplikasi ini menggunakan **Livewire-heavy architecture** dengan 34+ komponen interaktif yang menggantikan kebutuhan AJAX tradisional:

- **Controllers** - Handle HTTP requests, delegate ke Services
- **Request** - Form validation requests
- **Models** - Eloquent models untuk database interaction
- **Services** - Menangani logika bisnis utama controller
- **Providers** - Service providers untuk dependency injection
- **Traits** - Reusable logic (NotifikasiTraits, UpdateDeleteTraits, PeriodeTraits)

## Penggunaan

### Login Pertama Kali

Setelah instalasi dan seeding database, Anda dapat login dengan akun default yang dibuat oleh `UserSeeder`. Periksa file `/database/seeders/UserSeeder.php` untuk kredensial default.

### Workflow Umum

1. **Admin** menambahkan data kategori
2. **Admin** menambahkan data destinasi
3. **Pengguna** register dan login akun
4. **Admin** melihat activity log
5. **Pengguna** melihat informasi sistem
6. **Pengguna** melihat informasi destinasi
7. **Pengguna** membuat rencana perjalanan
8. **Admin** melihat pengajuan destinasi

## Deployment

### Requirements Production

- PHP 8.2 atau lebih tinggi
- PostgreSQL (Supabase)
- Composer
- Node.js & NPM
- Web server dengan SSL certificate

### GitHub Actions

Project ini sudah dilengkapi dengan GitHub Actions untuk auto-deployment. Konfigurasi dapat dilihat di `.github/workflows/deploy.yml`.

## Kontribusi

Kontribusi selalu diterima! Silakan ikuti langkah berikut:

1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## Lisensi

Project ini dilisensikan di bawah [MIT License](LICENSE).

## Support

Jika ada pertanyaan atau issues, silakan:
- Buat issue di GitHub repository
- Hubungi tim development

---

**Developed with ❤️ for Sistem Informasi Institut Teknologi Kalimantan**

*Last updated: November 2025*
