@extends('layouts.admin')

@section('title', 'Manage Products')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Product Management</h1>

        <a href="{{ route('admin.products.create') }}"
           class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition">
            + Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg bg-green-100 text-green-700 px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded-xl overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-3">Image</th>
                    <th class="text-left px-4 py-3">Name</th>
                    <th class="text-left px-4 py-3">Price</th>
                    <th class="text-left px-4 py-3">Stock</th>
                    <th class="text-center px-4 py-3">Actions</th>
                </tr>
            </thead>

            <tbody>
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
                            $imageUrl = 'https://picsum.photos/seed/' . $product->id . '/100/100';
                        }
                    @endphp

                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">
                            <img src="{{ $imageUrl }}"
                                 alt="{{ $product->name }}"
                                 class="w-16 h-16 object-cover rounded-lg border">
                        </td>

                        <td class="px-4 py-3 font-medium text-gray-800">
                            {{ $product->name }}
                        </td>

                        <td class="px-4 py-3 text-gray-700">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>

                        <td class="px-4 py-3 text-gray-700">
                            {{ $product->stock }}
                        </td>

                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                               class="text-blue-600 hover:underline font-medium">
                                Edit
                            </a>

                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                  method="POST"
                                  class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-red-600 hover:underline ml-3 font-medium"
                                        onclick="return confirm('Delete product?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center px-4 py-8 text-gray-500">
                            No products found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($products, 'links'))
        <div class="mt-6">
            {{ $products->links() }}
        </div>
    @endif
</div>
@endsection