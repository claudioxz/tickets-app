@extends('layouts.main-layout')
@section('title', 'Iniciar Sesión')
@section('content')
<section class="section">
    <h1 class="title is-1 has-text-centered">Tickets App</h1>
    <div class="tabs is-boxed is-centered">
        <ul>
            <li class="is-active" data-id="login-form">
                <a>
                    <span>Iniciar Sesión</span>
                </a>
            </li>
            <li data-id="register-form">
                <a>
                    <span>Registrarse</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="container">
        @if(session()->get( 'registerComplete' ) != null)
        <div class="columns justify-center">
            <div class="column is-two-fifths notification is-success">
                <button class="delete"></button>
                {{session()->get( 'registerComplete' )}}
            </div>
        </div>
        @endif

        @if (session()->get('errorLogin') != null)
        <div class="columns justify-center">
            <div class="column is-two-fifths notification is-danger">
                <button class="delete"></button>
                {{session()->get( 'errorLogin' )}}
            </div>
        </div>
        @endif
        <div class="columns justify-center">
            <div class="column is-two-fifths">
                @include('auth.signin')
                @include('auth.register')
            </div>
        </div>
    </div>
</section>
@endsection


@section('script')
<script>
    window.addEventListener('load', function(){
        const tabs = document.querySelectorAll('.tabs li');
        
        const element = document.querySelector('#register-form .help');
        if(element){
            // If registration form has errors
            changeTab(tabs[1], tabs[0]);
        }
        
        tabs.forEach(item => {
            item.addEventListener('click', function() {
                if(item.classList.contains('is-active')){
                    return;
                }

                const oldActive =  document.querySelector('.tabs li.is-active');
                changeTab(item, oldActive);
            });
        });


        function changeTab(newActive, oldActive){
            oldActive.classList.remove('is-active');
            newActive.classList.add('is-active');
            
            const oldContentId = oldActive.dataset.id;
            const contentId = newActive.dataset.id;
            document.getElementById(contentId).style.display = 'block';
            document.getElementById(oldContentId).style.display = 'none';
        }


        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            $notification = $delete.parentNode;

            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    })
</script>
@endsection