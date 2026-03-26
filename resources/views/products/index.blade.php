@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-r from-orange-100 to-amber-200">
    <div class="absolute inset-0">
        <img src="{{ \App\Models\Setting::get('hero_image', 'https://www.shutterstock.com/image-vector/ecommerce-shopping-via-smartphone-easy-260nw-2255718065.jpg') }}"
             alt="Hero Image"
             class="w-full h-full object-cover opacity-80">
    </div>

    <div class="relative z-10 text-center py-32 px-6 bg-black/10 backdrop-blur-sm">
        <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 drop-shadow-lg mb-4">
            {{ \App\Models\Setting::get('hero_title', 'Temukan Produk Terbaik di MyShop') }}
        </h1>

        <p class="text-lg md:text-xl text-gray-700 mb-8">
            {{ \App\Models\Setting::get('hero_subtitle', 'Kualitas terbaik untuk gaya hidup Anda') }}
        </p>

        @php
            $waNumber = \App\Models\Setting::get('whatsapp_number', '628123456789');
            $waText = urlencode('Halo, saya ingin bertanya tentang produk di MyShop.');
            $waLink = "https://wa.me/{$waNumber}?text={$waText}";
        @endphp


        <div class="flex justify-center space-x-6">
            <a href="{{ $waLink }}"
               target="_blank"
               class="bg-green-600 text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-green-700 transition">
                Hubungi Admin
            </a>
        </div>
    </div>
</section>


<!-- Product Section -->
<section class="container mx-auto px-6 py-20">

    <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center text-gray-900">
        {{ \App\Models\Setting::get('bestseller_title', 'Produk Unggulan Kami') }}
    </h2>

    @if($products->count())

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">

        @foreach ($products as $product)

        @php
            // decode meta
            $meta = is_array($product->meta) ? $product->meta : json_decode($product->meta ?? '{}', true);

            $imagePath = $meta['image'] ?? null;

            if($imagePath){

                // FIX WINDOWS PATH
                $imagePath = str_replace('\\','/',$imagePath);

                // hapus storage jika ada
                $imagePath = preg_replace('#^storage/#','',$imagePath);

                $imageUrl = asset('storage/'.$imagePath);

            }else{

                $imageUrl = 'https://picsum.photos/seed/'.$product->id.'/400/300';

            }
        @endphp


        <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition overflow-hidden">

            <div class="relative">

                <img src="{{ $imageUrl }}"
                     alt="{{ $product->name }}"
                     class="w-full h-60 object-cover group-hover:scale-105 transition duration-500 ease-in-out">

                <div class="absolute top-3 right-3 bg-white/90 px-3 py-1 rounded-full text-sm font-medium text-gray-800 shadow">
                    {{ rand(10,30) }}% OFF
                </div>

            </div>


            <div class="p-5">

                <h3 class="text-lg font-semibold mb-2 text-gray-900 truncate">
                    {{ $product->name }}
                </h3>

                <p class="text-gray-600 mb-4">
                    Rp {{ number_format($product->price,0,',','.') }}
                </p>

                <a href="{{ route('product.show',$product->slug) }}"
                   class="block w-full bg-black text-white text-center py-2 rounded-lg font-medium hover:bg-gray-800 transition">
                    Lihat Detail
                </a>

            </div>

        </div>

        @endforeach

    </div>

    @else

    <p class="text-center text-gray-500 text-lg">
        Belum ada produk tersedia.
    </p>

    @endif

</section>

@endsection