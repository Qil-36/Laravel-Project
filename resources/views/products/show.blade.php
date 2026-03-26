@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        @php
            $meta = is_array($product->meta)
                ? $product->meta
                : json_decode($product->meta ?? '{}', true);

            $image = $meta['image'] ?? null;
            $imageUrl = $image
                ? asset('storage/' . $image)
                : \App\Models\Setting::get('store_logo', asset('images/logo.png'));

            $waNumber = \App\Models\Setting::get('whatsapp_number', '628123456789');
            $waMessage = urlencode("Halo, saya tertarik dengan produk *{$product->name}* di toko Anda.");
            $waLink = "https://wa.me/{$waNumber}?text={$waMessage}";
        @endphp

        <!-- Gambar Produk -->
        <div>
            <img src="{{ $imageUrl }}"
                 alt="{{ $product->name }}"
                 class="w-full h-96 object-cover rounded-lg shadow-md">
        </div>

        <!-- Detail Produk -->
        <div>
            <h1 class="text-3xl font-bold mb-3">{{ $product->name }}</h1>
            <p class="text-2xl font-semibold text-gray-800 mb-4">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>

            <p class="text-gray-600 mb-6 leading-relaxed">
                {!! nl2br(e($product->description ?? 'Tidak ada deskripsi produk.')) !!}
            </p>

            <a href="{{ $waLink }}"
               target="_blank"
               class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-700 transition duration-300">
                Hubungi Admin via WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection
