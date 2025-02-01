<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Где пользователи должны быть направлены после успешной аутентификации.
     *
     * @var string
     */
    protected string $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            return redirect()->route('admin'); // Редирект на админскую панель
        }

        return redirect('/'); // Для обычных пользователей
    }
    public function login(Request $request)
    {
        // Валидация входных данных
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Проверка аутентификации
        if (Auth::attempt($credentials)) {
            // Если аутентификация успешна, перенаправляем пользователя
            return redirect('/'); // или другая страница
        }
        // Если аутентификация не удалась, перенаправляем обратно на страницу входа с ошибкой
        return back()->withErrors([
            'email' => 'Неверный логин или пароль.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // Перенаправление на страницу входа
    }


}

