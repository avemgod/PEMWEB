<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan ini ada
use Illuminate\Http\Request; // Pastikan ini ada (meskipun tidak digunakan langsung)

class PublicProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
}