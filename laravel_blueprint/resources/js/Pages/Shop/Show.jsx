import React from 'react';
import { useForm } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function Show({ product }) {
  const cartForm = useForm({ product_id: product.id, quantity: 1 });
  const wishlistForm = useForm({ product_id: product.id });

  return (
    <AppLayout>
      <h1 className="text-2xl font-semibold">{product.name}</h1>
      <p className="mt-2 text-slate-700">{product.description}</p>
      <p className="mt-2 font-bold">{product.price} €</p>
      <div className="mt-4 flex gap-3">
        <button onClick={() => cartForm.post('/cart')} className="rounded bg-emerald-600 px-4 py-2 text-white">Ajouter au panier</button>
        <button onClick={() => wishlistForm.post('/wishlist')} className="rounded border px-4 py-2">Favori</button>
      </div>
    </AppLayout>
  );
}
