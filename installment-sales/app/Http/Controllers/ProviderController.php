<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    public function login(Request $request)
    {
        $validData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credential = [
            'username' => $validData['username'],
            'password' => $validData['password']
        ];
        if (auth('providers')->attempt($credential)) {
            auth('providers')->login(auth('providers')->user());
            return redirect()->route('provider.dashboard');
        } else {
            return redirect()->back()->with('error', 'Login failed, provider does not exist');
        }
    }

    public function register(ProviderRequest $request)
    {
        $validData = $request->validated();
        $firstName = $validData['firstName'];
        $lastName = $validData['lastName'];
        $username = $validData['username'];
        $password = $validData['password'];
        $workFieldId = $validData['workField'];
        Provider::create([
            'workField_id' => $workFieldId,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'username' => $username,
            'password' => Hash::make($password),
        ]);
        return redirect()->route('provider.login')->with('success', 'welcome ' . $firstName . ' ' . $lastName . ' you are registered successfully');
    }
    public function logout(){
        auth('providers')->logout();
        return redirect()->route('home-page');
    }
}
