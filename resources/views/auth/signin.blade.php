<form id="login-form" action="/login" method="POST">
    @csrf
    <div class="field">
        <div class="control">
            <input class="input" name="email" type="email" placeholder="Correo electronico" autofocus="">
        </div>
    </div>

    <div class="field">
        <div class="control">
            <input class="input" name="password" type="password" placeholder="Contraseña">
        </div>
    </div>
    <button type="submit" class="button is-block is-info is-medium is-fullwidth">
        Iniciar sesión
    </button>
</form>