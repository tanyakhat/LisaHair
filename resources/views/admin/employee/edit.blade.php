@extends('layouts.admin')

@section('title', 'Редактировать сотрудника')

@section('content')

    <header>
        <img src="{{ asset('img/logo/logo.png') }}" alt="Логотип Lisa">
        <h1>Редактировать сотрудника</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">На главную</a></li>
                <li><a href="{{ route('admin.employee.index') }}">Сотрудники</a></li>
            </ul>
        </nav>
    </header>

    <div class="container mt-5">
        <form action="{{ route('admin.employee.update', $employee->id) }}" method="POST">
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Имя сотрудника</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $employee->name) }}" required>
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="employee_position" class="form-label">Должность</label>
                <input type="text" id="employee_position" name="employee_position" class="form-control" value="{{ old('employee_position', $employee->employee_position) }}" required>
                @error('employee_position')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="reviews_count" class="form-label">Количество отзывов</label>
                <input type="number" id="reviews_count" name="reviews_count" class="form-control" value="{{ old('reviews_count', $employee->reviews_count) }}" required min="0">
                @error('reviews_count')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Обновить сотрудника</button>
        </form>
    </div>

@endsection
