<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()    //Route::get('/login','SessionsController@create');

    {
        return view('sessions.create');
    }

    public function destroy()   //Route::get('/logout','SessionsController@destroy');
    {
        auth()->logout();
        return redirect()->home();
    }

    public function store()     //Route::post('/login','SessionsController@store');
    {
        if (! Auth::attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message' => 'Please Check your credentials and try again.!'
            ]);
        }
        return redirect()->home();
    }
}
