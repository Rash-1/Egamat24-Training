<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {

        $payment_conditions = auth('providers')->user()->paymentConditions()->get()->all();
        $services = auth('providers')->user()->services()->get()->all();
        $provided_services = auth('providers')->user()->providedServices()->get()->all();
        return view('provider/dashboard', [
            'services' => $services,
            'payment_conditions' => $payment_conditions,
            'provided_services' => $provided_services,
        ]);
    }
}
