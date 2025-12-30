<head>
    <meta charset="utf-8" />
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Activa') | {{ config('app.name', 'Activa') }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.min.css') }}">

</head>
