import React from 'react';
import { useForm } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function CartIndex({ items }) {
  const checkoutForm = useForm({ coupon_code: '' });

  return (
    <AppLayout>
      <h1 className="mb-4 text-2xl font-semibold">Mon panier</h1>
      {items.map((item) => (
        <div key={item.id} className="mb-3 rounded border bg-white p-3">
          {item.product.name} × {item.quantity}
        </div>
      ))}
      <input
        value={checkoutForm.data.coupon_code}
        onChange={(e) => checkoutForm.setData('coupon_code', e.target.value)}
        placeholder="Coupon"
        className="mr-2 rounded border p-2"
      />
      <button onClick={() => checkoutForm.post('/checkout')} className="rounded bg-indigo-600 px-4 py-2 text-white">Payer</button>
    </AppLayout>
  );
}
