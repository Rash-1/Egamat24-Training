<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\WorkField;

class HomePageController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $work_fields = WorkField::all();
        return view('home', ['services' => $services, 'work_fields' => $work_fields]);
    }

    public function work_field_services(WorkField $workField)
    {
        $services = Service::where('work_field_id', $workField->id)->get();
        $work_fields = WorkField::all();
        return view('client/categoryServices', ['services' => $services, 'work_fields' => $work_fields]);
    }

    public function show_service_payment_conditions(Service $service)
    {
        $payment_conditions = $service->paymentConditions()->get();
        return view('client/paymentConditions', ['service' => $service, 'payment_conditions' => $payment_conditions]);
    }

}
