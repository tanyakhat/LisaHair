<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        // Проверяем, является ли пользователь администратором
        if (!auth()->check() || !auth()->user()->is_admin) {
            return redirect('/');  // Перенаправляем, если не администратор
        }

        return $next($request);
    }
}
