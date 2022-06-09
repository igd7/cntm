<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Test</title>


</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-4">
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
