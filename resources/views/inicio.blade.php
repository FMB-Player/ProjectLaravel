@php
    use Carbon\Carbon;
    // Carbon es una librería estándar de PHP para trabajar con fechas y horas.
@endphp
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de gestión de Clientes</title>
        {{-- Bootstrap CSS --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        {{-- Local table CSS --}}
        <link rel="stylesheet" href="{{ asset('table.css') }}">
    </head>
    <body>
    @include('header')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="container">
            <h1 class="text-center mt-3">Sistema de gestión de Clientes</h1>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('clientes.crear') }}" class="btn btn-success">Crear Cliente Nuevo</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    @if ($clientes->isEmpty())
                        <p class="text-center">Aún no hay clientes registrados.</p>
                    @else
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Seguro</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Fecha de Ingreso</th>
                                    <th scope="col">Categoría</th>
                                    <th scope="col" colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                {{-- Formateo para la tabla (Fecha, Teléfono) --}}
                                @php
                                $CarbonFormat = Carbon::createFromFormat('Y-m-d', $cliente->fecha_ingreso);
                                $fecha = $CarbonFormat->format('M, d. Y');
                                $tel = substr($cliente->telefono, 0, 3) . " " . substr($cliente->telefono, 3, 4) . "-" . substr($cliente->telefono, 7);
                                @endphp
                                    <tr>
                                        <td>{{ $cliente->nombre_cli }}</td>
                                        <td>{{ $cliente->edad }}</td>
                                        <td>{{ $cliente->seguro ? 'Sí' : 'No' }}</td>
                                        <td>{{ $tel }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>{{ $fecha }}</td>
                                        <td>
                                            @switch($cliente->categoria_id)
                                                @case(1)
                                                    Altos
                                                    @break
                                                @case(2)
                                                    Medios
                                                    @break
                                                @case(3)
                                                    Bajos
                                                    @break
                                                @default
                                                    N/A
                                            @endswitch
                                        </td>
                                        <td>
                                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary">Editar</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este cliente?');">Borrar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p class="text-center">Hay {{ $clientes->count() }} cliente(s) registrado(s).</p>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
