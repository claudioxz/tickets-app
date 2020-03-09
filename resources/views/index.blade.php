@extends('layouts.main-layout')

@section('title', 'Inicio')

@section('content')
@include('layouts.nav')
<section class="section">
    <div class="container">
        <h1 class="is-size-2">Mis tickets</h1>
        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Esta pedido</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tickets as $ticket)
                <tr>
                    <td>{{$ticket->id}}</td>
                    <td>{{$ticket->ticket_pedido === 1 ? 'Si' : 'No'}}</td>
                    <td>
                        @if ($ticket->ticket_pedido === 0)
                        <a href="/mark-ticket/{{$ticket->id}}" class="button is-info">
                            Pedir ticket
                        </a>
                        @else
                        <button disabled class="button is-info">
                            Ya pedido
                        </button>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="has-text-centered" colspan="4">
                        <strong class="is-size-4">
                            No hay tickets
                        </strong>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection