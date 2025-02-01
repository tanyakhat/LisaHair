@extends('layouts.admin')

@section('title', 'Список сотрудников')

@section('content')

    <header>
        <img src="{{asset('img/logo/logo.png')}}" alt="Логотип Lisa">
        <h1>Сотрудники</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">На главную</a></li>
                <li><a href="{{ route('admin.employee.create') }}">Добавить сотрудника</a></li>
            </ul>
        </nav>
    </header>

    <table class="table">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Должность</th>
            <th>Количество отзывов</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->employee_position }}</td>
                <td>{{ $employee->reviews_count }}</td>
                <td>
                    <a href="">Редактировать</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
