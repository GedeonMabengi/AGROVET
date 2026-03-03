<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $items = CartItem::with('product')
            ->where('user_id', $request->user()->id)
            ->get();

        return Inertia::render('Cart/Index', ['items' => $items]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $product = Product::findOrFail($data['product_id']);

        CartItem::updateOrCreate(
            ['user_id' => $request->user()->id, 'product_id' => $product->id],
            ['quantity' => $data['quantity']]
        );

        return back()->with('success', 'Panier mis à jour.');
    }

    public function destroy(CartItem $cart)
    {
        abort_unless($cart->user_id === auth()->id(), 403);
        $cart->delete();

        return back()->with('success', 'Article supprimé du panier.');
    }
}
