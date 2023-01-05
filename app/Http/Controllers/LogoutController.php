<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{

    public function store()
    {
        // LOGOUT
        auth()->logout();

        // REDIRIGIR A LOGIN
        return redirect()->route('login');
    }
}
