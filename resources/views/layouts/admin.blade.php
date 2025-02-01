<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Админ-панель')</title>
    <link rel="icon" href="{{ asset('img/logo/logo3.png')}}" type="image/x-icon">
{{-- Стиль для админки   --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
{{--  Стиль для подключение шрифтов--}}
    <link rel="stylesheet" href="{{ asset ('css/fonts.css') }}">
    {{-- Подключение библиотеки icons--}}
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css')}}">

</head>

<body>
<a class="navbar-brand" href="{{ url('/admin') }}">
    <i class="fas fa-long-arrow-alt-left" style="color: white"></i>
</a>
@yield('content')

</body>

</html>
