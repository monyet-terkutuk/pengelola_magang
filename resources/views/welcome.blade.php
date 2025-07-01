<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white text-black">
    <div class="relative min-h-screen flex flex-col">
        <header class="fixed top-0 left-0 w-full bg-white shadow-md py-4 px-6 flex items-center justify-between z-50">
            <div class="flex items-center">
                <h2 class="font-bold">Home</h2>
            </div>
            <nav class="flex items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-black hover:text-gray-700">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-black hover:text-gray-700">Log in</a>
                    @endauth

                    {{-- <a href="{{ route('internships.create') }}" class="btn btn-primary mt-3 mb-3">
                        <i class="fas fa-plus"></i> Add New Internship
                    </a> --}}
                @endif
                <a href="{{ route('request-internship.create') }}"
                    class="bg-black text-white px-4 py-2 rounded-md hover:bg-red-600">Pengajuan Internship</a>
            </nav>
        </header>

        <main class="h-screen flex flex-col items-center justify-center text-left px-6 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 max-w-5xl w-full">
                <!-- Gambar di kiri -->
                <div class="flex justify-center md:justify-start">
                    <img src="{{ asset('assets/img/SIMDISKO LOGO.png') }}" alt="SIMDISKO Logo">
                </div>

                <!-- Teks di kanan -->
                <div class="flex flex-col justify-center text-left">
                    <h1 class="text-4xl font-bold text-gray-900">Selamat Datang di SIMDISKO</h1>
                    <p class="mt-4 text-lg text-gray-600 max-w-md">
                        Sistem Informasi Magang Diskominfo, Platform dan Pengajuan Magang di Diskominfo Bandung.
                    </p>
                </div>
            </div>
        </main>
        <!-- Section Tahapan Pengajuan -->
        <section class="h-screen flex items-center px-6 max-w-5xl w-full mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 w-full">
                <!-- Tahapan Pengajuan Magang -->
                <div class="bg-white p-8 rounded-lg shadow-lg w-full">
                    <h2 class="text-3xl font-bold text-gray-900 border-b-4 pb-3">TAHAPAN PENGAJUAN MAGANG</h2>
                    <ol class="mt-6 space-y-6 text-lg text-gray-700 leading-relaxed">
                        <li><strong>1.</strong> Membuat 2 surat permohonan magang/PKL ditujukan ke Diskominfo Kabupaten
                            Bandung
                            dan mempersiapkan CV.</li>
                        <li><strong>2.</strong> Menunggu konfirmasi dan surat balasan dari Diskominfo Kabupaten Bandung.
                        </li>
                        <li><strong>3.</strong> Mengirimkan surat balasan dari Diskominfo dan surat permohonan magang ke
                            Kesbangpol Kabupaten Bandung.</li>
                        <li><strong>4.</strong> Mendapatkan surat dari Kesbangpol dan melaksanakan magang sesuai jadwal
                            yang
                            telah ditentukan.</li>
                    </ol>
                    <div class="mt-8 p-6 bg-blue-100 border-l-4 border-blue-500 text-blue-800 text-lg">
                        <strong>ℹ INFO:</strong> Penerimaan dapat dicek secara berkala melalui halaman pengajuan,
                        maksimal 10
                        hari setelah pengajuan magang.
                    </div>
                </div>

                <!-- Periode dan Pelaksanaan Magang -->
                <div class="bg-gray-200 p-8 rounded-lg shadow-lg w-full">
                    <h2 class="text-3xl font-bold text-gray-900">PERIODE PENDAFTARAN MAGANG / PKL</h2>
                    <ul class="mt-6 text-lg text-gray-800 font-medium space-y-4">
                        <li>• Juli</li>
                        <li>• Oktober</li>
                        <li>• Januari</li>
                        <li>• April</li>
                    </ul>

                    <hr class="my-6 border-t-4 border-gray-400">

                    <h2 class="text-3xl font-bold text-gray-900">PELAKSANAAN MAGANG</h2>
                    <ul class="mt-6 text-lg text-gray-800 font-medium space-y-4">
                        <li>• Juli - September</li>
                        <li>• Oktober - Desember</li>
                        <li>• Januari - Maret</li>
                        <li>• April - Juni</li>
                    </ul>
                </div>
            </div>
        </section>


    </div>
</body>

</html>