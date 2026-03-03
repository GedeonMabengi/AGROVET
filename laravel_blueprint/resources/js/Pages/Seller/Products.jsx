import React from 'react';
import { useForm } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function SellerProducts({ products }) {
  const form = useForm({ name: '', slug: '', description: '', price: '', stock: 0 });

  return (
    <AppLayout>
      <h1 className="mb-4 text-2xl font-semibold">Mes produits vendeur</h1>
      <div className="mb-4 grid gap-2 rounded border bg-white p-4">
        <input placeholder="Nom" className="rounded border p-2" onChange={(e) => form.setData('name', e.target.value)} />
        <input placeholder="Slug" className="rounded border p-2" onChange={(e) => form.setData('slug', e.target.value)} />
        <input placeholder="Prix" className="rounded border p-2" onChange={(e) => form.setData('price', e.target.value)} />
        <input placeholder="Stock" className="rounded border p-2" onChange={(e) => form.setData('stock', e.target.value)} />
        <button onClick={() => form.post('/seller/products')} className="rounded bg-emerald-600 px-4 py-2 text-white">Créer</button>
      </div>
      {products.data.map((p) => <div key={p.id} className="mb-2 rounded border bg-white p-2">{p.name}</div>)}
    </AppLayout>
  );
}
