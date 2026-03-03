import React from 'react';
import AppLayout from '../../Layouts/AppLayout';

export default function Dashboard({ stats }) {
  return (
    <AppLayout>
      <h1 className="mb-4 text-2xl font-semibold">Administration</h1>
      <div className="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div className="rounded border bg-white p-4">Utilisateurs: {stats.users}</div>
        <div className="rounded border bg-white p-4">Produits: {stats.products}</div>
        <div className="rounded border bg-white p-4">Avis en attente: {stats.pending_reviews}</div>
      </div>
    </AppLayout>
  );
}
