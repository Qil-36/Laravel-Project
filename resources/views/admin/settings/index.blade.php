@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-6">
    <h1 class="text-3xl font-bold mb-8">Pengaturan Toko</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Nama Toko -->
        <div>
            <label class="block font-semibold mb-1">Nama Toko</label>
            <input type="text" name="store_name" value="{{ $settings['store_name'] ?? '' }}" class="w-full border rounded-lg p-2">
        </div>

        <!-- Alamat Toko -->
        <div>
            <label class="block font-semibold mb-1">Alamat Toko</label>
            <textarea name="store_address" class="w-full border rounded-lg p-2">{{ $settings['store_address'] ?? '' }}</textarea>
        </div>

        <!-- Logo -->
        <div>
            <label class="block font-semibold mb-1">URL Logo</label>
            <input type="text" name="store_logo" value="{{ $settings['store_logo'] ?? '' }}" class="w-full border rounded-lg p-2">
        </div>

        <!-- Hero Image -->
        <div>
            <label class="block font-semibold mb-1">Hero Image URL</label>
            <input type="text" name="hero_image" value="{{ $settings['hero_image'] ?? '' }}" class="w-full border rounded-lg p-2">
        </div>

        <!-- Hero Title -->
        <div>
            <label class="block font-semibold mb-1">Hero Title</label>
            <input type="text" name="hero_title" value="{{ $settings['hero_title'] ?? '' }}" class="w-full border rounded-lg p-2">
        </div>

        <!-- Hero Subtitle -->
        <div>
            <label class="block font-semibold mb-1">Hero Subtitle</label>
            <input type="text" name="hero_subtitle" value="{{ $settings['hero_subtitle'] ?? '' }}" class="w-full border rounded-lg p-2">
        </div>

        <!-- 🔥 WhatsApp Number -->
        <div>
            <label class="block font-semibold mb-1">Nomor WhatsApp Admin</label>
            <input 
                type="text" 
                name="whatsapp_number" 
                placeholder="Contoh: 628123456789 (tanpa + atau 0)" 
                value="{{ $settings['whatsapp_number'] ?? '' }}" 
                class="w-full border rounded-lg p-2">
            <p class="text-sm text-gray-500 mt-1">
                Gunakan format internasional tanpa tanda +, misalnya: <code>628123456789</code>
            </p>
        </div>

        <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800 transition">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
