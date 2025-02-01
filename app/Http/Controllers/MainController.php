<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{


    public function stocks()
    {
        return view('stocks');
    }
    public function masters()
    {
        return view('masters');
    }
    public function faq()
    {
        return view('faq');
    }
    public function footer()
    {
        return view('footer');
    }
}
