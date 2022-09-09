<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Provider;
use App\Models\RequestedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProviderController extends Controller
{
    //Authentication
    public function login(Request $request)
    {
        $valid_data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credential = [
            'username' => $valid_data['username'],
            'password' => $valid_data['password']
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
        $valid_data = $request->validated();
        $firstname = $valid_data['firstname'];
        $lastname = $valid_data['lastname'];
        $username = $valid_data['username'];
        $password = $valid_data['password'];
        $work_field_id = $valid_data['work-field'];
        Provider::create([
            'work_field_id' => $work_field_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'username' => $username,
            'password' => Hash::make($password),
        ]);
        return redirect()->route('provider.login')->with('success', 'welcome ' . $firstname . ' ' . $lastname . ' you are registered successfully');
    }

    public function logout()
    {
        auth('providers')->logout();
        return redirect()->route('home-page');
    }

    //profile
    public function showProfile(Provider $provider)
    {
        $services = $provider->services()->get();
        return view('provider/profile', ['provider' => $provider, 'services' => $services]);
    }

    //Requested Services
    public function show_requests()
    {
        $requested_services = auth('providers')->user()->requestedServices;
        return view('provider/requestedServices', ['requested_services' => $requested_services]);
    }

    public function accept_request(RequestedService $requestedService)
    {
        $requestedService->update([
            'status' => 'accepted'
        ]);
        return redirect()->back()->with('success','Request Successfully Accepted');
    }

    public function reject_request(RequestedService $requestedService)
    {
        $requestedService->update([
            'status' => 'rejected'
        ]);
        return redirect()->back()->with('success','Request Successfully Rejected');
    }
}
