<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::query()
            ->where('is_active', true)
            ->when($request->search, fn ($q) => $q->where('name', 'like', "%{$request->search}%"))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return Inertia::render('Shop/Index', [
            'products' => $products,
            'filters' => $request->only('search'),
        ]);
    }

    public function show(Product $product)
    {
        $product->load(['seller:id,name', 'reviews' => fn ($q) => $q->where('is_approved', true)]);

        return Inertia::render('Shop/Show', [
            'product' => $product,
        ]);
    }
}
