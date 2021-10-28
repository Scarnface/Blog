<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
      return view('register.create');
    }

    public function store()
    {
      $attributes = request()->validate([
        'name' => ['required', 'max:255'],
        'username' => ['required', 'max:255', 'min:3'],
        'email' => ['required', 'max:255', 'email'],
        'password' => ['required', 'max:255', 'min:7']
      ]);

      User::create($attributes);

      return redirect('/');
    }
}