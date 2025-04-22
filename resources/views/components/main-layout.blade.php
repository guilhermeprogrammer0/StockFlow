<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$titulo}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{asset('icon/logo.jpeg')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="{{asset('assets/bootstrap.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">
   
</head>
<body class="{{$color ?? white}}">
    {{$slot}}
</body>
</html>