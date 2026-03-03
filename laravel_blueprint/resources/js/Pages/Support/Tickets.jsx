import React from 'react';
import { useForm } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function Tickets({ tickets }) {
  const form = useForm({ subject: '', message: '' });

  return (
    <AppLayout>
      <h1 className="mb-4 text-2xl font-semibold">Support</h1>
      <input className="mb-2 w-full rounded border p-2" placeholder="Sujet" onChange={(e)=>form.setData('subject', e.target.value)} />
      <textarea className="mb-2 w-full rounded border p-2" placeholder="Message" onChange={(e)=>form.setData('message', e.target.value)} />
      <button onClick={()=>form.post('/support/tickets')} className="rounded bg-slate-900 px-4 py-2 text-white">Envoyer</button>
      <div className="mt-6 space-y-2">
        {tickets.map((t) => <div key={t.id} className="rounded border bg-white p-3">[{t.status}] {t.subject}</div>)}
      </div>
    </AppLayout>
  );
}
