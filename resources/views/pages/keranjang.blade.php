@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12 text-center">
    <h1 class="text-3xl font-bold mb-6">Keranjang Belanja</h1>
    <p class="text-gray-600">Keranjang kamu masih kosong.</p>
    <a href="{{ route('produk') }}" class="inline-block mt-4 bg-black text-white px-4 py-2 rounded hover:bg-gray-800">
        Lihat Produk
    </a>
</div>
@endsection
