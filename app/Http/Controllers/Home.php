<?php

namespace App\Http\Controllers;

class Home extends Controller
{
    public function index() {
        return view('home.index');
    }
}