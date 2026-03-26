<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ \App\Models\Setting::get('store_name', config('app.name', 'MyShop')) }}</title>
    <meta name="description" content="{{ \App\Models\Setting::get('store_tagline', 'Shop quality and comfort today!') }}">
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-800 flex flex-col min-h-screen font-sans">

    @include('layouts.navigation')

    <main class="flex-grow">
        {{-- Untuk halaman toko kamu --}}
        @yield('content')

        {{-- Untuk halaman Breeze yang pakai $slot --}}
        @isset($slot)
            {{ $slot }}
        @endisset
    </main>

    <footer class="bg-gray-100 text-center py-8 mt-12">
        <div class="container mx-auto px-6">
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }}
                {{ \App\Models\Setting::get('store_name', 'MyShop') }}. All rights reserved.
            </p>
            <p class="text-xs text-gray-400 mt-1">
                {{ \App\Models\Setting::get('store_address', 'Jl. Mawar No. 88, Jakarta') }}
            </p>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('menu-toggle');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => menu.classList.toggle('hidden'));
        }
    </script>
</body>
</html>