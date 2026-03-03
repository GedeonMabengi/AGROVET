<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminModerationController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'users' => User::count(),
                'products' => Product::count(),
                'pending_reviews' => Review::where('is_approved', false)->count(),
            ],
        ]);
    }

    public function approveReview(Review $review)
    {
        $review->update(['is_approved' => true]);
        return back()->with('success', 'Avis approuvé.');
    }

    public function suspendUser(User $user)
    {
        $user->update(['is_suspended' => true]);
        return back()->with('success', 'Utilisateur suspendu.');
    }

    public function deactivateProduct(Product $product)
    {
        $product->update(['is_active' => false]);
        return back()->with('success', 'Produit masqué.');
    }
}
