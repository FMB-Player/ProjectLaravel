    <nav class="menu">
        <ul class="menu_list">
            <li class="menu_element {{ Request::is('Clientes') ? 'active' : '' }}"><a href="{{ route('Clientes.index') }}">Clientes</a></li>
            <li class="menu_element {{ Request::is('Propiedades') ? 'active' : '' }}"><a href="{{ route('Propiedades.index') }}">Propiedades</a></li>
            <li class="menu_element {{ Request::is('Propietarios') ? 'active' : '' }}"><a href="{{ route('Propietarios.index') }}">Propietarios</a></li>
            <li class="menu_element {{ Request::is('Rentas') ? 'active' : '' }}"><a href="{{ route('Rentas.index') }}">Renta</a></li>
            <li class="menu_element {{ Request::is('Tipos_Propiedad') ? 'active' : '' }}"><a href="{{ route('Tipos_Propiedad.index') }}">Tipos de Propiedad</a></li>
        </ul>
    </nav>
