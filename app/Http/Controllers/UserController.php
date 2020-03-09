<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $tickets = Auth::user()->tickets;
        return view('index', ['tickets' => $tickets]);
    }

    public function markTicket($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
        $ticket->ticket_pedido = 1;
        $ticket->save();
        return redirect()->route('home');
    }
}
