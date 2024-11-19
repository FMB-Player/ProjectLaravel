@component('index')
    Nuevo cliente
@endcomponent
<style>
    form {
        padding: 1em;
        width: 25%;
        border: 1px solid gray;
        display: grid;
        border-radius: 5px;
    }
    button {
        width: min-content;
    }
    input {
        width: 90%;
        border-radius: 5px;
        border: 1px solid gray;
    }
</style>
<div>

    <form action="{{ route('Clientes.store') }}" method="POST">
        @csrf
        <legend>Crear Cliente</legend>
        <label for="nombre_cliente">Nombre del cliente</label>
        <input type="text" name="nombre_cliente" id="nombre_cliente" required> <br>
        <label for="telefono_cliente">Telefono del cliente</label>
        <input type="number" name="telefono_cliente" id="telefono_cliente" required> <br>
        <button type="submit">Crear</button>
    </form>
</div>
