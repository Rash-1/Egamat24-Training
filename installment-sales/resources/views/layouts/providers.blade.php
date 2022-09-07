<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite([
    'resources/css/app.css',
    'resources/sass/app.scss',
    'resources/js/app.js',
    'resources/js/bootstrap.bundle.min.js',
    'resources/css/bootstrap.min.css',
    'resources/css/style.css'
    ])
</head>
<body>
@include('provider/navbar',['header'=>'Providers Dashboard'])
<div class="content container my-4">
    @yield('contents')
</div>
</body>
</html>
