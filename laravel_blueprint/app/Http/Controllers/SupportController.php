<?php

namespace App\Http\Controllers;

use App\Models\SupportTicket;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupportController extends Controller
{
    public function index(Request $request)
    {
        $tickets = SupportTicket::where('user_id', $request->user()->id)->latest()->get();
        return Inertia::render('Support/Tickets', ['tickets' => $tickets]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:4000'],
        ]);

        SupportTicket::create($data + ['user_id' => $request->user()->id, 'status' => 'open']);
        return back()->with('success', 'Ticket support créé.');
    }
}
