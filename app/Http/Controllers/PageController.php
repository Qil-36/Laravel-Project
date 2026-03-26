<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function produk()
    {
        $products = Product::all();
        return view('pages.produk', compact('products'));
    }

    public function blog()
    {
        return view('pages.blog');
    }

    public function keranjang()
    {
        return view('pages.keranjang');
    }

    public function tentang()
    {
        return view('pages.tentang');
    }
}
