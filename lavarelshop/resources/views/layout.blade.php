<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('./public/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('./public/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('./public/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('./public/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('./public/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('./public/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('./public/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('./public/css/style.css') }}" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</head>

<body>
   
    @include('inc.header')

    @include('inc.header')
    @include('inc.banner')

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif
    @yield('content')
    @include('inc.footer')

    @yield('scripts')

</body>

</html>