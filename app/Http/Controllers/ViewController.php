<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }

    public function user()
    {
        return view('user.index');
    }
}
