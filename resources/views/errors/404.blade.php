<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/404.scss') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>{{ config('app.title', 'Notas del colegio') }}</title>
</head>
<body>

    <img src="{{ asset('img/aplauso.png') }}" height="500" width="142" class="center">
    <h1>Oops! La pagina que buscas no existe!</h1>
    <h2 style="text-align:center"><a href="{{ route('home') }}">Retornar a la pagina principal</a></h2>

</body>
</html>
