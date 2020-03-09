@extends('layouts.main-layout')
@section('title', 'Crear nuevo Ticket')
@include('layouts.nav')


<section class="section">
    <div class="container">
        <div class="card is-fullwidth">
            <header class="card-header">
                <p class="card-header-title">
                    Crear nuevo Ticket
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <form action="/create-ticket" method="POST">
                        @csrf
                        @component('forms.ticket-form', [
                            'usuarios' => $usuarios,
                            'submitText' => 'Crear'
                        ])
                        @endcomponent
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>