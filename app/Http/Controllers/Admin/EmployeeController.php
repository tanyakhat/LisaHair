<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employee.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'employee_position' => 'required|string|max:255',
            'reviews_count' => 'required|integer|min:0',
        ]);

        // Создание нового сотрудника
        Employee::create([
            'name' => $request->input('name'),
            'employee_position' => $request->input('employee_position'),
            'reviews_count' => $request->input('reviews_count'),
        ]);

        return redirect()->route('admin.employee.index')->with('success', 'Сотрудник успешно добавлен!');
    }


    public function edit($id)
    {
        $employee = Employee::findOrFail($id); // Получаем сотрудника по id
        return view('admin.employee.edit', compact('employee')); // Передаем переменную в представление
    }

// Метод для обновления данных сотрудника
    public function update(Request $request, $id)
    {
        // Валидируем входящие данные
        $request->validate([
            'name' => 'required|string|max:255',
            'employee_position' => 'required|string|max:255',
            'reviews_count' => 'required|integer|min:0',
        ]);

        // Находим сотрудника по id
        $employee = Employee::findOrFail($id);

        // Обновляем данные сотрудника
        $employee->update([
            'name' => $request->input('name'),
            'employee_position' => $request->input('employee_position'),
            'reviews_count' => $request->input('reviews_count'),
        ]);

        // Перенаправляем на страницу списка сотрудников с сообщением об успехе
        return redirect()->route('admin.employee.index')->with('success', 'Сотрудник обновлен');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect()->route('admin.employee.index')->with('success', 'Сотрудник успешно удалён!');
    }

    public function selection()
    {
        $employees = Employee::all();
        \Log::info($employees); // Логируем данные
        return view('online-registration.services-selection', compact('employees'));
    }
}
