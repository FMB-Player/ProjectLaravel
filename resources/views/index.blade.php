<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('menu.css') }}">
    <title>{{ $slot ?? 'Trabajo Laravel' }}</title>
</head>
<body>
    @include('menu')
    <h1>Trabajo Laravel</h1>

    @include('footer')
</body>
</html>
