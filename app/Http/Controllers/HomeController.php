<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function profile()
    {
        return view('profile');
    }
}