@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <h1 class="text-3xl font-bold mb-6">Semua Produk</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse($products as $product)
            @php
                $meta = is_array($product->meta)
                    ? $product->meta
                    : json_decode($product->meta ?? '{}', true);

                $imagePath = $meta['image'] ?? null;

                if ($imagePath) {
                    $imagePath = str_replace('\\', '/', $imagePath);
                    $imagePath = ltrim($imagePath, '/');
                    $imagePath = preg_replace('#^storage/#', '', $imagePath);

                    $imageUrl = asset('storage/' . $imagePath);
                } else {
                    $imageUrl = \App\Models\Setting::get('store_logo', asset('images/logo.png'));
                }
            @endphp

            <div class="border rounded-xl shadow-sm p-4 hover:shadow-lg transition duration-300 bg-white">
                <img src="{{ $imageUrl }}"
                     alt="{{ $product->name }}"
                     class="w-full h-52 object-cover rounded-md mb-3">

                <h3 class="font-semibold text-lg truncate">{{ $product->name }}</h3>
                <p class="text-gray-600 mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                <a href="{{ route('product.show', $product->slug) }}"
                   class="inline-block w-full bg-black text-white text-center px-4 py-2 rounded hover:bg-gray-800 transition">
                    Lihat Detail
                </a>
            </div>
        @empty
            <p class="text-gray-500 text-center col-span-full">Belum ada produk.</p>
        @endforelse
    </div>
</div>
@endsection