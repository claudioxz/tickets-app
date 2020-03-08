<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tickets App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

    <style>
        .tab-content {
            display: none;
        }

        .justify-center {
            justify-content: center;
        }
    </style>
</head>

<body>
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
            <div class="columns justify-center">
                <div class="column is-two-fifths">
                    @include('auth.sigin')
                    @include('auth.register')
                </div>
            </div>
        </div>
    </section>
</body>

<script>
    window.addEventListener('load', function(){
        const tabs = document.querySelectorAll('.tabs li');
        tabs.forEach(item => {
            item.addEventListener('click', function() {
                if(item.classList.contains('is-active')){
                    return;
                }

                const oldActive =  document.querySelector('.tabs li.is-active');
                oldActive.classList.remove('is-active');
                item.classList.add('is-active');
                
                const oldContentId = oldActive.dataset.id;
                const contentId = item.dataset.id;
                document.getElementById(contentId).style.display = 'block';
                document.getElementById(oldContentId).style.display = 'none';
            });
        });
    })
</script>

</html>