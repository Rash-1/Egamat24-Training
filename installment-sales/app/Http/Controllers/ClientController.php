<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsRequest;
use App\Models\client;
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
        $firstName = $validData['firstName'];
        $lastName = $validData['lastName'];
        $password = $validData['password'];
        $client = client::create([
            'username' => $username,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'password' => Hash::make($password),
        ]);
        return redirect()->route('client.login-form')->with('success', 'register successfully');
    }

    function logout(){
        \auth('clients')->logout();
        \request()->session()->invalidate();
        \request()->session()->regenerateToken();
        return redirect()->route('home-page');
    }
}
