<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['usuario'])->get();

        return view('admin.home', ['tickets' => $tickets]);
    }

    public function createTicketForm(Request $request)
    {
        $usuarios = Usuario::where('id_tipo_usuario', 2)->get();

        return view('admin.create-ticket', ['usuarios' => $usuarios]);
    }


    public function createTicket(Request $request)
    {
        $ticketData = $request->validate([
            'id_usuario' => 'required|numeric|exists:usuario,id',
            'ticket_pedido' => 'nullable',
        ]);

        Ticket::create([
            'id_usuario' => $ticketData['id_usuario'],
            'ticket_pedido' => isset($ticketData['ticket_pedido']) ? 1 : 0
        ]);

        return redirect()->route('admin')->with(['ticketCreated' => 'El ticket se ha creado exitosamente']);
    }

    public function deleteTicket($id, Request $request){

        $ticket = Ticket::where('id', $id)->first();

        $ticket->delete();
        return redirect()->route('admin')->with(['ticketDeleted' => 'El ticket se ha eleminado exitosamente']);
    }

    public function editTicketForm($ticketId)
    {
        $usuarios = Usuario::where('id_tipo_usuario', 2)->get();
        
        $ticket = Ticket::where('id', $ticketId)->first();
        return view('admin.edit-ticket', [
            'usuarios' => $usuarios,
            'ticket' => $ticket,
        ]);
    }

    public function editTicket($id, Request $request)
    {
        $ticketData = $request->validate([
            'id_usuario' => 'required|numeric|exists:usuario,id',
            'ticket_pedido' => 'nullable',
        ]);

        $ticket = Ticket::where('id', $id)->firstOrFail();

        $ticket->update([
            'id_usuario' => $ticketData['id_usuario'],
            'ticket_pedido' => isset($ticketData['ticket_pedido']) ? 1 : 0
        ]);

        return redirect()
                ->route('admin')
                ->with(['ticketModified' => 'El ticket se ha actualizado exitosamente']);
    }
}
