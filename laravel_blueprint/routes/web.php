<?php

use App\Http\Controllers\AdminModerationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SellerProductController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::post('/wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{wishlist}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::get('/support/tickets', [SupportController::class, 'index'])->name('support.index');
    Route::post('/support/tickets', [SupportController::class, 'store'])->name('support.store');

    Route::middleware(['role:seller,admin'])->prefix('seller')->name('seller.')->group(function () {
        Route::get('/products', [SellerProductController::class, 'index'])->name('products.index');
        Route::post('/products', [SellerProductController::class, 'store'])->name('products.store');
    });

    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminModerationController::class, 'dashboard'])->name('dashboard');
        Route::patch('/reviews/{review}/approve', [AdminModerationController::class, 'approveReview'])->name('reviews.approve');
        Route::patch('/users/{user}/suspend', [AdminModerationController::class, 'suspendUser'])->name('users.suspend');
        Route::patch('/products/{product}/deactivate', [AdminModerationController::class, 'deactivateProduct'])->name('products.deactivate');
    });
});
