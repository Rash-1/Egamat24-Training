<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsRequest;
use App\Models\client;
use App\Models\WorkField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    function login(Request $request)
    {
        $validData = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);
        $credential = [
            'username' => \request('username'),
            'password' => \request('password'),
        ];
        if (\auth('clients')->attempt($credential)) {
            \auth('clients')->login(\auth('clients')->user());
            return redirect()->route('home-page');
        }
        return redirect()->route('client.login-form')->with('error', 'Login Failed');
    }

    function register(ClientsRequest $request)
    {
        $validData = $request->validated();
        $username = $validData['username'];
        $firstname = $validData['firstname'];
        $lastname = $validData['lastname'];
        $password = $validData['password'];
        $client = client::create([
            'username' => $username,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'password' => Hash::make($password),
        ]);
        return redirect()->route('client.login-form')->with('success', 'welcome ' . $firstname . ' ' . $lastname . ' you are registered successfully');
    }

    function logout(){
        \auth('clients')->logout();
        \request()->session()->invalidate();
        \request()->session()->regenerateToken();
        return redirect()->route('home-page');
    }

}
