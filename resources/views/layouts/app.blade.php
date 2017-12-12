<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MoreCorp') }} | Dashboard</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body  class="login-img3-body">

@yield('content')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<footer class="footer navbar-fixed-bottom" id="footer">
    <div class="container">
        <p>Copyright Alan, &copy; 2017</p>
    </div>

</footer>
</body>
</html>
