<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $services = Service::all();
        $employees = Employee::all();
        return view('home',['services'=>$services, 'employees'=>$employees]);
    }

}
