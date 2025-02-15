<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

### ГЛАВНЫЕ СТРАНИЦЫ
Route::get('/', [HomeController::class, 'index'])->name('home'); // Главная страница
Route::get('/stocks', [MainController::class, 'stocks'])->name('stocks'); // Акции
Route::get('/masters', [MainController::class, 'masters'])->name('masters'); // Мастера
Route::get('/faq', [MainController::class, 'faq'])->name('faq'); // Вопросы
Route::get('/footer', [MainController::class, 'footer'])->name('footer'); // Футер

### СЕРВИСЫ (ДЛЯ ПОЛЬЗОВАТЕЛЕЙ)
Route::get('/services-selection', [ServiceController::class, 'selection'])->name('services.selection');
### АВТОРИЗАЦИЯ
Auth::routes();
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/login', function () {
    return view('auth.login'); // Страница входа
})->name('login');

### АДМИН-ПАНЕЛЬ (ТОЛЬКО ДЛЯ АВТОРИЗОВАННЫХ ПОЛЬЗОВАТЕЛЕЙ)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'adminPanel'])->name('admin'); // Панель администратора

    ### СЕРВИСЫ (ДЛЯ АДМИНИСТРАТОРА)
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services.index'); // Список услуг
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create'); // Создание услуги
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store'); // Сохранение услуги
    Route::resource('services', ServiceController::class);


    Route::get('/admin/services/{service}', [ServiceController::class, 'show'])->name('admin.services.show'); // Просмотр услуги
    Route::get('/admin/services/{service}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit'); // Редактирование услуги
    Route::put('/admin/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update'); // Обновление услуги
    Route::delete('/admin/services/{service}', [ServiceController::class, 'destroy'])->name('admin.services.destroy'); // Удаление услуги

    ### СОТРУДНИКИ (ДЛЯ АДМИНИСТРАТОРА)
    Route::get('/admin/employee', [EmployeeController::class, 'index'])->name('admin.employee.index');
    Route::get('/admin/employee/create', [EmployeeController::class, 'create'])->name('admin.employee.create'); // Форма добавления сотрудника
    Route::post('/admin/employee', [EmployeeController::class, 'store'])->name('admin.employee.store'); // Сохранение сотрудника
    Route::get('/admin/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('admin.employee.edit'); // Страница редактирования
//    Route::put('/admin/employee/{id}', [EmployeeController::class, 'update'])->name('admin.employee.update'); // Обновление сотрудника
});

