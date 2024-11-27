<head>
    <link rel="stylesheet" href="{{ asset('menu.css') }}">
</head>
<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom box-shadow" style="background-color: #f8f9fa; position: sticky; top: 0; z-index: 1000;">
    <nav class="my-2 my-md-0 mr-md-auto">
        <a class="p-3 text-dark menu-elem" href="{{ route('inicio') }}">INICIO</a>
        <a class="p-3 text-dark menu-elem" href="{{ route('clientes.crear') }}">CREAR CLIENTE</a>
    </nav>
</header>

