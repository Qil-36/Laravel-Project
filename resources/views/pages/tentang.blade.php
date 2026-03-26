@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12 text-center">
    <h1 class="text-3xl font-bold mb-6">Tentang Kami</h1>
    <p class="text-gray-600 max-w-2xl mx-auto">
        {{ \App\Models\Setting::get('store_name', 'MyShop') }} berdedikasi menghadirkan produk berkualitas tinggi
        dengan kenyamanan terbaik. Kami percaya setiap langkah kecil dapat membawa perubahan besar.
    </p>
</div>
@endsection
