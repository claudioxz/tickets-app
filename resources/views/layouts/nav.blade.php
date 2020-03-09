<nav class="navbar is-link" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <div class="navbar-item">
            <h2 class="title is-4 has-text-white">
                Tickets App
            </h2>
        </div>
    </div>
    <div class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/admin">
                Inicio
            </a>
            @if (Auth::user()->isAdmin())
            <a class="navbar-item" href="/create-ticket-form">
                Crear nuevo ticket
            </a>
            @endif
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-secondary" href="logout">
                        <strong>Cerrar sesión</strong>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>