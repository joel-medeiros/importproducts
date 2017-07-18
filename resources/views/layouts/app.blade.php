<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet"  href="{{ elixir('css/app.css') }}" />
    <link rel="stylesheet"  href="{{ elixir('css/all.css') }}" />

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
@include('layouts.navigation')

<div class="container">
    <div id="alert_content"></div>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ elixir('js/app.js') }}"></script>
<script src="{{ elixir('js/all.js') }}"></script>
@yield('js')
</body>
</html>
