@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 max-w-2xl">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold mb-1">Product Name</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full border-gray-300 rounded-lg" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" class="w-full border-gray-300 rounded-lg" rows="4">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">Image</label>
            @php
                $meta = is_array($product->meta) ? $product->meta : json_decode($product->meta ?? '{}', true);
            @endphp
            @if(!empty($meta['image']))
                <img src="{{ asset('storage/' . $meta['image']) }}" class="h-32 rounded mb-3">
            @endif
            <input type="file" name="image" accept="image/*" class="w-full border-gray-300 rounded-lg">
        </div>

        <button type="submit" class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">
            Update Product
        </button>
    </form>
</div>
@endsection
