<div class="field">
    <label class="label">Seleccionar usuario</label>
    <div class="control">
        <div class="select is-fullwidth">
            <select name="id_usuario" required>
                <option value="" readonly hidden selected></option>
                @foreach ($usuarios as $usuario)
                <option value="{{$usuario->id}}" 
                        {{$id_usuario ?? 0 === $usuario->id ? 'selected' : ''}}>
                    {{$usuario->nombre}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="field">
    <div class="control">
        <label class="checkbox">
            <input type="checkbox" {{$ticket_pedido ?? '' === 1 ? 'checked' : ''}} name="ticket_pedido">
            Esta pedido?
        </label>
    </div>
</div>

<div class="field is-grouped">
    <div class="control">
        <button type="submit" class="button is-link">
            {{$submitText}}
        </button>
    </div>
    <div class="control">
        <a href="/admin" class="button is-link is-light">
            Volver
        </a>
    </div>
</div>