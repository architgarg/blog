<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationsController extends Controller
{
    public function create()
    {
        return view('registrations.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create(request(['name', 'email' , 'password']));

        auth()->login($user);

        return redirect()->home();
    }
}
