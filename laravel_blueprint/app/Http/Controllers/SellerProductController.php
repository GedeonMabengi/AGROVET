<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SellerProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('seller_id', $request->user()->id)->latest()->paginate(15);

        return Inertia::render('Seller/Products', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ]);

        $request->user()->products()->create($data + ['is_active' => true]);

        return back()->with('success', 'Produit vendeur créé.');
    }
}
