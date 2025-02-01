@extends('layouts.admin')

@section('title', 'Список сотрудников')

@section('content')

    <header>
        <img src="{{asset('img/logo/logo.png')}}" alt="Логотип Lisa">
        <h1>Услуги</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">На главную</a></li>
                <li><a href="{{ route('admin.services.create') }}">Добавить услугу</a></li>
            </ul>
        </nav>
    </header>

    @if($services->isEmpty())
        <p>Нет услуг для отображения.</p>
    @else
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>Категория</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->category->name ?? 'Без категории' }}</td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}">Редактировать</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline-block;">
                            @method('DELETE')
                            <button type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
