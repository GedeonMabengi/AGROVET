<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'coupon_code' => ['nullable', 'string'],
        ]);

        $items = CartItem::with('product')->where('user_id', $request->user()->id)->get();
        abort_if($items->isEmpty(), 422, 'Panier vide.');

        $subtotal = $items->sum(fn ($item) => $item->quantity * $item->product->price);
        $discount = 0;
        $coupon = null;

        if (!empty($data['coupon_code'])) {
            $coupon = Coupon::where('code', $data['coupon_code'])->where('is_active', true)->first();
            if ($coupon) {
                $discount = $coupon->type === 'percent'
                    ? ($subtotal * ($coupon->value / 100))
                    : min($subtotal, $coupon->value);
            }
        }

        $order = DB::transaction(function () use ($request, $items, $subtotal, $discount, $coupon) {
            $order = Order::create([
                'user_id' => $request->user()->id,
                'status' => 'paid',
                'subtotal' => $subtotal,
                'discount_total' => $discount,
                'total' => $subtotal - $discount,
                'coupon_id' => $coupon?->id,
            ]);

            foreach ($items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'seller_id' => $item->product->seller_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->product->price,
                    'line_total' => $item->quantity * $item->product->price,
                ]);
            }

            CartItem::where('user_id', $request->user()->id)->delete();

            return $order;
        });

        return redirect()->route('orders.show', $order)->with('success', 'Commande validée.');
    }
}
