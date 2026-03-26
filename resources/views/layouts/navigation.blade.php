<nav class="bg-white border-b shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        {{-- Logo + Store Name --}}
        <a href="{{ route('home') }}" class="flex items-center space-x-3">
            <img src="{{ \App\Models\Setting::get('store_logo', '/images/logo.png') }}"
                 alt="Logo"
                 class="h-8 w-auto">
            <span class="text-2xl font-extrabold tracking-tight text-gray-900">
                {{ \App\Models\Setting::get('store_name', 'MyShop') }}
            </span>
        </a>

        {{-- Menu toko --}}
        <div class="space-x-8 hidden md:flex items-center">
            @php
                $menuItems = json_decode(\App\Models\Setting::get('store_menu', '["Produk","Blog","Keranjang","Tentang"]'), true);
                $links = [
                    'Produk' => route('produk'),
                    'Blog' => route('blog'),
                    'Keranjang' => route('keranjang'),
                    'Tentang' => route('tentang'),
                ];
            @endphp

            @foreach($menuItems as $item)
                <a href="{{ $links[$item] ?? '#' }}"
                   class="text-gray-600 hover:text-gray-900 font-medium transition">
                    {{ $item }}
                </a>
            @endforeach

            {{-- Tombol Login/Admin --}}
            @guest
                <a href="{{ route('login') }}"
                   class="ml-2 bg-black text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-800 transition">
                    Login
                </a>
            @endguest

            @auth
                <a href="{{ route('admin.products.index') }}"
                   class="ml-2 bg-black text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-800 transition">
                    Admin
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="ml-2 bg-gray-200 text-gray-800 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-300 transition">
                        Logout ({{ auth()->user()->name }})
                    </button>
                </form>
            @endauth
        </div>

        {{-- Mobile Menu Button --}}
        <button id="menu-toggle" class="md:hidden focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Mobile Dropdown --}}
    <div id="mobile-menu" class="hidden md:hidden border-t bg-white">
        @foreach($menuItems as $item)
            <a href="{{ $links[$item] ?? '#' }}"
               class="block px-6 py-3 text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition">
                {{ $item }}
            </a>
        @endforeach

        @guest
            <a href="{{ route('login') }}"
               class="block px-6 py-3 text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition">
                Login
            </a>
        @endguest

        @auth
            <a href="{{ route('admin.products.index') }}"
               class="block px-6 py-3 text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition">
                Admin
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-6 py-3 text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition">
                    Logout ({{ auth()->user()->name }})
                </button>
            </form>
        @endauth
    </div>
</nav>