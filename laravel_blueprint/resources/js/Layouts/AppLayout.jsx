import React from 'react';
import { Link, usePage } from '@inertiajs/react';

export default function AppLayout({ children }) {
  const { auth } = usePage().props;

  return (
    <div className="min-h-screen bg-slate-50 text-slate-900">
      <header className="border-b bg-white">
        <div className="mx-auto flex max-w-6xl items-center justify-between px-4 py-3">
          <Link href="/" className="font-bold">AGROVET</Link>
          <nav className="flex gap-4 text-sm">
            <Link href="/cart">Panier</Link>
            {auth?.user?.role === 'seller' || auth?.user?.role === 'admin' ? <Link href="/seller/products">Vendeur</Link> : null}
            {auth?.user?.role === 'admin' ? <Link href="/admin/dashboard">Admin</Link> : null}
          </nav>
        </div>
      </header>
      <main className="mx-auto max-w-6xl p-4">{children}</main>
    </div>
  );
}
