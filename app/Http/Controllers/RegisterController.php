<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }



    public function store(Request $request)
    {
        // GET AND MODIFY USERNAME IN THE REQUEST
        $request->request->add([
            'username' => Str::slug($request->username)
        ]);

        // VALIDATIONS
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:5|max:15',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:8'
        ]);

        // INSERT IN DATABASE
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('posts.index', [
            'user'=>auth()->user()
        ]);

    }
}
