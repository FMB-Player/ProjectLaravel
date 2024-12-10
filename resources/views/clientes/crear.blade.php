<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrar Cliente</title>
        {{-- Bootstrap CSS --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        {{-- Local form CSS --}}
        <link rel="stylesheet" href="{{ asset('forms.css') }}">
    </head>
    <body>
        @include('header')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif --}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-container">
                        <div class="form-header" id="header">
                            Registrar Nuevo Cliente
                        </div>
                        <form action="{{ route('clientes.guardar') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre_cli">Nombre:</label>
                                <input type="text" name="nombre_cli" id="nombre_cli" class="form-control" required autocomplete="name">
                            </div>
                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="number" name="edad" id="edad" class="form-control" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" name="seguro" id="seguro" class="form-check-input">
                                <label class="form-check-label" for="seguro">Seguro</label>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono:</label> <br>
                                <span>+54</span><input type="tel" name="telefono" id="telefono" class="form-control" autocomplete="tel-area-code" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" autocomplete="email" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="categoria_id">Categoría de Ingreso:</label>
                                <select name="categoria_id" id="categoria_id" class="form-control" required>
                                    <option value="" disabled selected>-- Seleccione una categoría --</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-dark">Registrar Cliente</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

