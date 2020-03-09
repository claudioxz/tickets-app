<form class="tab-content" id="register-form" action="/register" method="POST">
    @csrf
    <div class="field">
        <div class="control">
            <input class="input" 
                   value="{{ old('nombre') }}"
                   required
                   name="nombre" type="text" placeholder="Nombre" autofocus="">
        </div>
        @error('nombre')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="field">
        <div class="control">
            <input class="input" value="{{ old('email') }}" 
                   name="email" type="email" placeholder="Correo electronico" required autocomplete="off">

        @error('email')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
        </div>
    </div>
    <div class="field">
        <div class="control">
            <div class="select is-fullwidth">
                <select name="tipo-usuario" required>
                    <option value="" disabled hidden selected>Seleccionar un Rol</option>
                    <option value="1" {{ old('tipo-usuario') === '1' ? 'selected' : '' }}>Administrador</option>
                    <option value="2" {{ old('tipo-usuario') === '2' ? 'selected' : '' }}>Usuario normal</option>
                </select>
            </div>
            @error('tipo-usuario')
                <p class="help is-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="field">
        <div class="control">
            <input class="input" name="pass" type="password" placeholder="Contraseña" required autocomplete="off">
        </div>
        @error('pass')
            <p class="help is-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="field">
        <div class="control">
            <input class="input" name="pass_confirmation" type="password" required placeholder="Repetir Contraseña">
        </div>
    </div>
    <button type="submit" class="button is-block is-info is-medium is-fullwidth">
        Registrarse
    </button>
</form>