<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logo/logo3.png')}}" type="image/x-icon">
    <title>@yield('title', 'Lisa - студия наращивания и реконструкции волос')</title>

{{-- Стиль для основного контента Main.blade--}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
{{--    Стили для шрифтов--}}
    <link rel="stylesheet" href="{{ asset ('css/fonts.css') }}">
</head>
<body>
@auth
    @if(auth()->user()->is_admin)
        <a href="{{ route('admin') }}" target="_blank" style="color: black;text-decoration: none" class="btn btn-primary">Перейти в админку</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <br>
        <a href="#" class="btn btn-danger" style="color: black;text-decoration: none"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Выйти
        </a>
    @endif
@else
    <p><a href="{{ route('login') }}" style="color: black;text-decoration: none" class="btn btn-secondary">Войдите, чтобы получить доступ к админке</a></p>
@endauth
@include('headers.header')

<main>
    @yield('content')


</main>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
