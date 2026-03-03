<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'string', 'max:1500'],
        ]);

        Review::create([
            ...$data,
            'user_id' => $request->user()->id,
            'is_approved' => false,
        ]);

        return back()->with('success', 'Avis soumis pour modération.');
    }
}
