@include('header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 5%;
        }
        .form-container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
        }
        .form-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            text-align: center;
            font-weight: bold;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <div class="form-header" style="background-color: #212529;">
                        Editar Cliente
                    </div>
                    <form action="{{ route('clientes.actualizar', $cliente->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="nombre_cli">Nombre:</label>
                            <input type="text" name="nombre_cli" id="nombre_cli" class="form-control" value="{{ $cliente->nombre_cli }}" required>
                        </div>
                        <div class="form-group">
                            <label for="edad">Edad:</label>
                            <input type="number" name="edad" id="edad" class="form-control" value="{{ $cliente->edad }}" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="seguro" id="seguro" class="form-check-input" {{ $cliente->seguro ? 'checked' : '' }}>
                            <label class="form-check-label" for="seguro">Seguro</label>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono:</label>
                            <input type="tel" name="telefono" id="telefono" class="form-control" value="{{ $cliente->telefono }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $cliente->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha_ingreso">Fecha de Ingreso:</label>
                            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" value="{{ $cliente->fecha_ingreso }}" required>
                        </div>
                        <div class="form-group">
                            <label for="categoria_id">Categoría de Ingreso:</label>
                            <select name="categoria_id" id="categoria_id" class="form-control" required>
                                <option value="">Seleccione una categoría</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $cliente->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-dark">Editar Cliente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
