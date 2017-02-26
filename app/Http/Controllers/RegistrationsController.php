<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()    //Route::get('/register','RegistrationsController@create');
    {
        return view('registrations.create');
    }

    public function store()     //Route::post('/register','RegistrationsController@store');
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $password = bcrypt(request('password'));
        $name = request('name');
        $email = request('email');

//        $user = User::create(['name'=>$name, 'email'=>$email, 'password'=>$password]);
          $user = User::create(['name'=>$name, 'email'=>$email, 'password'=>$password]);

        auth()->login($user);

        return redirect()->home();

    }
}
