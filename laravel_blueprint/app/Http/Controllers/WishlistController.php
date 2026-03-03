<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate(['product_id' => ['required', 'exists:products,id']]);

        Wishlist::firstOrCreate([
            'user_id' => $request->user()->id,
            'product_id' => $data['product_id'],
        ]);

        return back()->with('success', 'Produit ajouté aux favoris.');
    }

    public function destroy(Wishlist $wishlist)
    {
        abort_unless($wishlist->user_id === auth()->id(), 403);
        $wishlist->delete();

        return back()->with('success', 'Favori supprimé.');
    }
}
