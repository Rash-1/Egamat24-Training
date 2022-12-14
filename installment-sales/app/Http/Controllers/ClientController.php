<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsRequest;
use App\Models\client;
use App\Models\ProvidedService;
use App\Models\RequestedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    //Authentication
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

    function logout()
    {
        \auth('clients')->logout();
        \request()->session()->invalidate();
        \request()->session()->regenerateToken();
        return redirect()->route('home-page');
    }

    //Requested Services
    public function request_service($service_id, $payment_condition_id)
    {
        $provided_service = ProvidedService::where(['service_id' => $service_id, 'payment_condition_id' => $payment_condition_id])->get()->first();
        RequestedService::create([
            'client_id' => auth('clients')->user()->id,
            'provided_service_id' => $provided_service->id,
            'provider_id' => $provided_service->provider_id
        ]);
        return redirect()->back()->with('success', 'Request successfully Send To Provider,Please Wait For Provider Answer');
    }

    public function show_requested_services()
    {
        $client_id = auth('clients')->user()->id;
        $requested_services = RequestedService::where('client_id',$client_id)->get();
        return view('client/requestedServices',['requested_services'=>$requested_services]);
    }

}
