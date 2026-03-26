<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - {{ config('app.name', 'MyShop') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg fixed inset-y-0 left-0">
        <div class="p-6 border-b">
            <h1 class="text-2xl font-bold text-gray-900">{{ config('app.name', 'MyShop') }}</h1>
            <p class="text-sm text-gray-500">Admin Dashboard</p>
        </div>

        <nav class="p-4 space-y-2">
            <a href="{{ route('products.index') }}" 
               class="block px-4 py-2 rounded-lg {{ request()->is('products*') ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
               🛍️ Products
            </a>
            <a href="{{ route('settings.index') }}" 
               class="block px-4 py-2 rounded-lg {{ request()->is('settings*') ? 'bg-gray-900 text-white' : 'text-gray-700 hover:bg-gray-200' }}">
               ⚙️ Settings
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8">
        <header class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900">@yield('title', 'Dashboard')</h2>

            <a href="/" class="text-sm bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">
                ⬅ Back to Store
            </a>
        </header>

        <div>
            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

</body>
</html>
