@extends('layouts.admin')

@section('title', 'Админ панель')

@section('content')

    <header>
        <img src="{{asset('img/logo/logo.png')}}" alt="Логотип Lisa">
        <h1>Админ-панель</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">На главную</a></li>
                <li><a href="{{ route('admin.services.index') }}">Услуги</a></li>
                <li><a href="{{ route('admin.employee.index') }}">Сотрудники</a></li>
            </ul>
        </nav>
    </header>
@endsection
