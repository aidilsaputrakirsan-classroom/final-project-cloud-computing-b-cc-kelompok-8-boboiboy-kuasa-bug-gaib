@extends('layouts.user')
@section('title', 'Tentang Kami')
@section('content')
    <!-- Header Banner -->
    <div class="relative">
        <div class="w-full h-64 md:h-96 overflow-hidden">
            <img src="{{ asset('images/indonesia-panorama.jpg') }}" alt="Panorama Indonesia"
                class="w-full h-full object-cover">
            <!-- Dot Pattern Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-40">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                    <pattern id="dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="3" cy="3" r="1.5" fill="white" opacity="0.2" />
                    </pattern>
                    <rect x="0" y="0" width="100%" height="100%" fill="url(#dots)" />
                </svg>
                <div class="absolute inset-0 flex items-center justify-center">
                    <h1 class="text-4xl md:text-5xl font-bold text-white text-center">Temukan Indonesia Bersama Kami</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto py-12 px-4">
        <!-- Sejarah Platform -->
        <div class="mb-16 text-center">
            <h2 class="text-3xl font-bold mb-6">Perjalanan <span class="text-primary">Kami</span></h2>
            <p class="text-gray-700 max-w-3xl mx-auto">
                Platform ini lahir dari kesadaran akan pentingnya informasi akurat tentang destinasi wisata Indonesia.
                Dikembangkan pertama kali pada 2023 sebagai bagian program Studi Independen Bersertifikat Dicoding Batch 6
                bersama <a href="https://www.linkedin.com/in/aufaahusniati/"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline" target="_blank">Aufaa
                    Husniati</a> dan <a href="https://www.linkedin.com/in/adriansyah-anca-197270214/"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline" target="_blank">Adriansyah
                    Anca</a>.

            </p>
            <p class="text-gray-700 max-w-3xl mx-auto">
                Awalnya, platform ini hanya menyajikan informasi destinasi wisata secara umum. Kini, sebagai proyek skripsi,
                saya mengembangkannya dengan menambahkan fitur prakiraan cuaca untuk setiap destinasi, membantu wisatawan
                merencanakan perjalanan lebih aman dan nyaman dengan informasi cuaca real-time.
            </p>
        </div>

        <!-- Visi & Misi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <div class="order-2 md:order-1">
                <h2 class="text-3xl font-bold text-gray-900">Misi <span class="text-primary">Kami</span></h2>
                <p class="mt-4 text-gray-700">
                    Kami percaya bahwa perencanaan perjalanan yang baik dapat meningkatkan pengalaman wisata Anda.
                    Oleh karena itu, kami menghadirkan informasi wisata lengkap dengan prakiraan cuaca agar Anda dapat
                    memilih waktu terbaik untuk menjelajahi destinasi impian Anda.
                </p>
                <h3 class="text-xl font-bold text-gray-900 mt-6">Visi Kami</h3>
                <p class="mt-2 text-gray-700">
                    Menjadi platform terdepan yang menghubungkan wisatawan dengan beragam keindahan Indonesia
                    melalui informasi yang akurat, terpercaya, dan mudah diakses.
                </p>
                <h3 class="text-xl font-bold text-gray-900 mt-6">Nilai-Nilai Kami</h3>
                <ul class="mt-2 text-gray-700 space-y-2">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-primary mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Akurasi informasi dalam setiap konten yang kami sajikan</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-primary mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Keberlanjutan pariwisata yang bertanggung jawab</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-primary mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>Pemberdayaan komunitas lokal di setiap destinasi</span>
                    </li>
                </ul>
            </div>
            <div class="order-1 md:order-2">
                <img src="{{ asset('images/destinations/IMG_20250402_182511.jpg') }}" alt="Nusa Dua Bali"
                    class="rounded-lg shadow-lg w-full h-96 object-cover">
            </div>
        </div>

        <!-- Fitur Unggulan -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-center mb-10">Fitur <span class="text-primary">Unggulan</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center transition-transform hover:scale-105">
                    <div
                        class="bg-primary bg-opacity-10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Destinasi Terpopuler</h3>
                    <p class="text-gray-600">Informasi lengkap tentang destinasi wisata populer di seluruh Indonesia</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center transition-transform hover:scale-105">
                    <div
                        class="bg-primary bg-opacity-10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M5.5 16a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 16h-8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Prakiraan Cuaca</h3>
                    <p class="text-gray-600">Prakiraan cuaca akurat untuk membantu Anda merencanakan perjalanan dengan lebih
                        baik</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center transition-transform hover:scale-105">
                    <div
                        class="bg-primary bg-opacity-10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Panduan Wisata</h3>
                    <p class="text-gray-600">Tips dan panduan lengkap untuk berbagai jenis perjalanan di Indonesia</p>
                </div>
            </div>
        </div>

        <!-- Statistik Platform -->
        <div class="bg-gray-50 rounded-xl p-8 mb-16">
            <h2 class="text-3xl font-bold text-center mb-10">Platform <span class="text-primary">Dalam Angka</span></h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div>
                    <div class="text-4xl font-bold text-primary mb-2">500+</div>
                    <p class="text-gray-600">Destinasi Wisata</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-primary mb-2">10k+</div>
                    <p class="text-gray-600">Pengguna Aktif</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-primary mb-2">34</div>
                    <p class="text-gray-600">Provinsi di Indonesia</p>
                </div>
                <div>
                    <div class="text-4xl font-bold text-primary mb-2">95%</div>
                    <p class="text-gray-600">Tingkat Kepuasan</p>
                </div>
            </div>
        </div>



        <!-- CTA -->
        <div class="bg-gradient-to-r from-primary to-blue-600 rounded-xl p-8 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Mulai Petualangan Anda Sekarang</h2>
            <p class="mb-6 max-w-2xl mx-auto">Temukan destinasi impian Anda berikutnya dengan informasi lengkap dan
                prakiraan cuaca yang akurat untuk pengalaman perjalanan terbaik.</p>
            <a href="{{ route('user.destinations.index') }}"
                class="inline-block bg-white text-primary font-bold px-6 py-3 rounded-lg hover:bg-gray-100 transition">Jelajahi
                Destinasi</a>
        </div>
    </div>
@endsection
