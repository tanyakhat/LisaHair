@extends('layouts.admin')

@section('content')
    <h1>Редактировать услугу</h1>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Название</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $service->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $service->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Цена</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $service->price) }}">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Категория</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">Выберите категорию</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $service->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
