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

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ config('app.name', 'MoreCorp') }}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="navbar" href="{{route('login')}}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script TYPE="application/javascript">
    $(document).on('click', '.btn-bid', function (e) {
        var id = $(this).val();
        var trField = $(this).parent().parent();
        $('#sku_field').val(trField.find('td#sku').text());


    });

</script>

<footer class="footer navbar-fixed-bottom" id="footer">
    <div class="container">
        <p>Copyright Alan, &copy; 2017</p>
    </div>

</footer>
</body>
</html>