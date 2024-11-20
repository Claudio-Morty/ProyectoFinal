<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Virtual</title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
    <header>
        <div>Inventario Virtual</div>
        <nav>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </nav>
    </header>

    <main class="main-content">
        <h1>Bienvenido a Inventario Virtual</h1>
        <p>Gestiona tus productos, controla tus ventas y organiza tu inventario con facilidad.</p>
    </main>

    <section class="features">
        <div class="feature-card">
            <h3>Gestión de Productos</h3>
            <p>Agrega, edita y organiza tus productos de manera eficiente.</p>
        </div>
        <div class="feature-card">
            <h3>Reportes Detallados</h3>
            <p>Obtén estadísticas precisas sobre tus ventas y movimientos.</p>
        </div>
        <div class="feature-card">
            <h3>Supervisa el nivel de Stock</h3>
            <p>Consulta el valor total de tu inventario en tiempo real, considerando costos y cantidades actuales.</p>
        </div>
    </section>

    <footer>
        © 2024 Inventario Virtual. Todos los derechos reservados.
    </footer>
</body>
</html>
