@component('index')
    Listado de clientes
@endcomponent
<h2>Lista de clientes</h2>
<br><br>
<div class="container">
    @if ($clientes->isEmpty())
        <p>No hay clientes registrados aún. ¿Deseas <a href="{{ route('Clientes.create') }}">Agregar uno</a>?</p>
    @else
    <table>
        <tr>
            <th>Nombre</th>
            <th>Telefono</th>
            <th colspan="2"></th>
        </tr>

        @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->nombre_cliente }}</td>
                <td>{{ $cliente->telefono_cliente }}</td>
                <td width="10px">
                    <a href="{{ route('Clientes.edit', $cliente->id) }}">Editar</a>
                </td>
                <td width="10px">
                    <form action="{{ route('Clientes.destroy', $cliente->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
    @endif
