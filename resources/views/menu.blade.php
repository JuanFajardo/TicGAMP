<nav class="navbar-default navbar-side" role="navigation">
<div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a @yield('menuProyecto') href="{{asset('index.php/Proyecto')}}"><i class="fa fa-desktop"></i> Trabajos</a>
            </li>
            <li>
                <a @yield('menuBoleta') href="{{asset('index.php/Boleta')}}"><i class="fa fa-bar-chart-o"></i> Bienes </a>
            </li>
            <li>
                <a @yield('menuCambio') href="{{asset('index.php/Cambio')}}"><i class="fa fa-qrcode"></i> Prestamos </a>
            </li>
            <li>
                <a @yield('menuReporte') href="{{asset('index.php/Reporte')}}"><i class="fa fa-file"></i> Resportes</a>
            </li>
        </ul>
    </div>
</nav>
