<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $formData = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' => ['required','max:255','min:3',Rule::unique('users', 'username')],
            'email' => ['required','email',Rule::unique('users', 'email')],
            'password' => 'required|min:8',
        ]);
        $user = User::create($formData);
        auth()->login($user);
        return redirect('/')->with('status', config('alert.message.create')." $user->name");
    }

    public function login(){
        return view('auth.login');
    }

    public function post_login(){
        $formData = request()->validate([
            'email' => ['required','email', 'max:255', Rule::exists('users', 'email')],
            'password' => ['required', 'min:8', 'max:255']
        ],
        [
            'email.required' => 'We need your email address'
        ]);
        if(auth()->attempt($formData)){
            return redirect('/')->with('status', config('alert.message.login'));
        }else{
            return redirect()->back()->withErrors([
                'email' => 'User Credentials wrong'
            ]);
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('status', config('alert.message.logout'));
    }
}
