<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products (for both admin & public).
     */
    public function index()
    {
        $products = Product::latest()->paginate(12);

        // Jika sedang di route admin, tampilkan layout admin
        if (request()->is('admin/products*')) {
            return view('admin.products.index', compact('products'));
        }

        // Jika route publik
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $slug = Str::slug($validated['name']);
        $sku  = strtoupper(Str::random(8));

        $meta = [];

        if ($request->hasFile('image')) {
            $meta['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'sku'         => $sku,
            'name'        => $validated['name'],
            'slug'        => $slug,
            'description' => $validated['description'] ?? null,
            'price'       => $validated['price'],
            'stock'       => $validated['stock'],
            'meta'        => json_encode($meta),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $meta = is_array($product->meta) ? $product->meta : json_decode($product->meta ?? '{}', true);

        if ($request->hasFile('image')) {
            if (!empty($meta['image']) && Storage::disk('public')->exists($meta['image'])) {
                Storage::disk('public')->delete($meta['image']);
            }
            $meta['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name'        => $validated['name'],
            'slug'        => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'price'       => $validated['price'],
            'stock'       => $validated['stock'],
            'meta'        => json_encode($meta),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $meta = is_array($product->meta) ? $product->meta : json_decode($product->meta ?? '{}', true);

        if (!empty($meta['image']) && Storage::disk('public')->exists($meta['image'])) {
            Storage::disk('public')->delete($meta['image']);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

    /**
     * Display a single product on the public site.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
