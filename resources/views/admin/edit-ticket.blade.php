@extends('layouts.main-layout')
@section('title', 'Editando Ticket')
@include('layouts.admin-nav')


<section class="section">
    <div class="container">
        <div class="card is-fullwidth">
            <header class="card-header">
                <p class="card-header-title">
                    Editar Ticket
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <form action="/edit-ticket/{{$ticket->id}}" method="POST">
                        @csrf
                        @component('forms.ticket-form', [
                            'usuarios' => $usuarios,
                            'id_usuario' => $ticket->id_usuario,
                            'ticket_pedido' => $ticket->ticket_pedido,
                            'submitText' => 'Editar'
                        ])
                        @endcomponent
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>