<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    function login()
    {
        $credential = [
            'username'=>\request('username'),
            'password'=>\request('password'),
        ];
        if(\auth('clients')->attempt($credential)){
            \auth('clients')->login(\auth('clients')->user());
            return redirect()->route('home-page');
        }
        return redirect()->route('client.login-form')->with('error','Login Failed');
    }
    function register()
    {
        $username=\request('username');
        $firstName=\request('firstName');
        $lastName=\request('lastName');
        $password=\request('password');
        $client = client::create([
            'username'=>$username,
            'first-name'=>$firstName,
            'last-name'=>$lastName,
            'password'=>Hash::make($password),
        ]);
        return redirect()->route('client.login-form')->with('success','register successfully');
    }
    function logout(){
        \auth('clients')->logout();
        \request()->session()->invalidate();
        \request()->session()->regenerateToken();
        return redirect()->route('home-page');
    }
}
