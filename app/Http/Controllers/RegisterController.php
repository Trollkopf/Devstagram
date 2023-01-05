<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth/register');
    }

    public function store(Request $request)
    {

        // Añadir el slug al request

        $request->request->add(['username'=> Str::slug($request->username)]);

        // VALIDACION

        $this->validate($request, [
            'name' => ['required', 'max:30', 'min:3'],
            'username' => ['required', 'unique:users', 'min:3', 'max:20'],
            'email' => ['required', 'unique:users', 'email', 'max:60'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // AUTENTICAR USUARIO

        // auth()->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password 
        // ]);

        auth()->attempt($request->only('email', 'password'));


        //REDIRECCIONAR

        return redirect()->route('post.index');
    }
}
