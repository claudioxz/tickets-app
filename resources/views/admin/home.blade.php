@extends('layouts.main-layout')
@section('title', 'Admin')


@section('content')
@include('layouts.admin-nav')

<section class="section">
    <div class="container">
        @if(session()->get( 'ticketCreated' ) != null)
            @component('components.notification', [
                'type' => 'is-success',
                'message' => session()->get( 'ticketCreated' )
            ])
            @endcomponent
        @endif

        @if (session()->get('ticketDeleted') != null)
            @component('components.notification', [
                'type' => 'is-danger',
                'message' => session()->get( 'ticketDeleted' )
            ])
            @endcomponent
        @endif

        @if (session()->get('ticketModified') != null)
            @component('components.notification', [
                'type' => 'is-success',
                'message' => session()->get( 'ticketModified' )
            ])
            @endcomponent
        @endif
        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Esta pedido</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->ticket_pedido === 1 ? 'Si' : 'No'}}</td>
                    <td>{{$ticket->usuario->nombre}}</td>
                    <td>
                        <div class="buttons has-addons">
                            <a class="button" href="/edit-ticket-form/{{$ticket->id}}">
                                <span class="icon has-text-info">
                                    <i class="fas fa-edit"></i>
                                </span>
                            </a>
                            <a class="button" href="/delete-ticket/{{$ticket->id}}">
                                <span class="icon has-text-danger">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="has-text-centered" colspan="4">
                        <strong class="is-size-4">
                            No hay tickets
                        </strong> 
                        <br>
                        <a class="button is-primary" href="/create-ticket-form">
                            <strong>
                                Crear un nuevo ticket ahora!
                            </strong>
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection