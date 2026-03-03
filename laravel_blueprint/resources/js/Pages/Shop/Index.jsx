import React from 'react';
import { Link, router } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function Index({ products, filters }) {
  return (
    <AppLayout>
      <h1 className="mb-4 text-2xl font-semibold">Catalogue</h1>
      <input
        defaultValue={filters.search || ''}
        onChange={(e) => router.get('/', { search: e.target.value }, { preserveState: true, replace: true })}
        className="mb-4 w-full rounded border p-2"
        placeholder="Rechercher un produit"
      />
      <div className="grid grid-cols-1 gap-4 md:grid-cols-3">
        {products.data.map((p) => (
          <Link key={p.id} href={`/products/${p.slug}`} className="rounded border bg-white p-4">
            <h2 className="font-medium">{p.name}</h2>
            <p className="text-sm text-slate-600">{p.price} €</p>
          </Link>
        ))}
      </div>
    </AppLayout>
  );
}
