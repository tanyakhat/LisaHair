@extends('layouts.admin')

@section('title', 'Добавить сотрудника')

@section('content')

    <header>
        <img src="{{asset('img/logo/logo.png')}}" alt="Логотип Lisa">
        <h1>Добавить нового сотрудника</h1>
        <nav>
            <ul>
                <li><a href="{{ route('admin.employee.index') }}">Назад к списку сотрудников</a></li>
            </ul>
        </nav>
    </header>

    <form action="{{ route('admin.employee.store') }}" method="POST">
        <div class="form-group">
            <label for="name">Имя сотрудника</label>
            <input type="text" id="name" name="name" required class="form-control">
        </div>

        <div class="form-group">
            <label for="employee_position">Должность</label>
            <input type="text" id="employee_position" name="employee_position" required class="form-control">
        </div>

        <div class="form-group">
            <label for="reviews_count">Количество отзывов</label>
            <input type="number" id="reviews_count" name="reviews_count" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

@endsection
