@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold mb-8 text-gray-800">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">

        @csrf
        @method('PUT')

        {{-- Product Name --}}
        <div>
            <label class="block font-semibold mb-1">Product Name</label>
            <input
                type="text"
                name="name"
                value="{{ old('name', $product->name) }}"
                class="w-full border-gray-300 rounded-lg"
                required
            >
        </div>

        {{-- Price --}}
        <div>
            <label class="block font-semibold mb-1">Price</label>
            <input
                type="number"
                step="0.01"
                name="price"
                value="{{ old('price', $product->price) }}"
                class="w-full border-gray-300 rounded-lg"
                required
            >
        </div>

        {{-- Stock --}}
        <div>
            <label class="block font-semibold mb-1">Stock</label>
            <input
                type="number"
                name="stock"
                value="{{ old('stock', $product->stock) }}"
                class="w-full border-gray-300 rounded-lg"
                required
            >
        </div>

        {{-- Description --}}
        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea
                name="description"
                rows="4"
                class="w-full border-gray-300 rounded-lg"
            >{{ old('description', $product->description) }}</textarea>
        </div>

        {{-- Image --}}
        <div>

            <label class="block font-semibold mb-2">Image</label>

            @php
                $meta = is_array($product->meta)
                    ? $product->meta
                    : json_decode($product->meta ?? '{}', true);

                $image = $meta['image'] ?? null;

                if ($image) {
                    $image = str_replace('\\', '/', $image);
                }
            @endphp

            @if($image)
                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2">Current Image:</p>

                    <img
                        src="{{ asset('storage/' . $image) }}"
                        alt="{{ $product->name }}"
                        class="h-32 w-32 object-cover rounded-lg border"
                    >
                </div>
            @endif

            <input
                type="file"
                name="image"
                accept="image/*"
                class="w-full border-gray-300 rounded-lg"
            >

        </div>

        {{-- Button --}}
        <div>
            <button
                type="submit"
                class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition"
            >
                Update Product
            </button>
        </div>

    </form>

</div>
@endsection