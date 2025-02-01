<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->get(); // Загружаем услуги с категориями
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::all(); // Получаем все категории
        return view('admin.services.create', compact('categories')); // Передаем категории в представление
    }

    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric', // Изменено на nullable
            'category_id' => 'required|exists:categories,id', // Проверка существования категории
        ]);

        // Сохранение услуги в базу данных
        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price, // Если цена не указана, она будет NULL
            'category_id' => $request->category_id, // Сохраняем category_id
        ]);

        // Перенаправление на страницу списка услуг
        return redirect()->route('admin.services.index')->with('success', 'Услуга успешно добавлена!');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service')); // Отображаем страницу услуги
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric', // Изменено на nullable
            'category_id' => 'required|exists:categories,id',
        ]);

        // Обновление услуги в базе данных
        $service = Service::findOrFail($id);

        // Обновляем только те поля, которые были переданы
        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price !== null ? $request->price : $service->price, // Если цена не указана, оставляем прежнее значение
            'category_id' => $request->category_id,
        ]);

        // Перенаправление на страницу списка услуг
        return redirect()->route('admin.services.index')->with('success', 'Услуга успешно обновлена!');
    }

    public function destroy(Service $service)
    {
        $service->delete(); // Удаление услуги из базы данных

        // Перенаправление на список услуг с уведомлением
        return redirect()->route('admin.services.index')->with('success', 'Услуга успешно удалена!');
    }
    public function selection()
    {
        $services = Service::all();
        \Log::info($services); // Логируем данные
        return view('online-registration.services-selection', compact('services'));
    }

}
