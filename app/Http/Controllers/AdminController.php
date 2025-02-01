<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminPanel()
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'У вас нет доступа к этой странице.');
        }

        return view('admin.dashboard');
    }

}


