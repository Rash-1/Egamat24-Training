<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    public function define(ServiceRequest $request)
    {
        $provider_services_title = auth('providers')->user()->services()->pluck('title');
        $valid_data = $request->validated();
        $new_service_fields = [
            'provider_id' => auth('providers')->user()->id,
            'title' => $valid_data['title'],
            'description' => $valid_data['description']
        ];
        $payment_conditions_identities = $valid_data['payment-conditions'];
        foreach ($provider_services_title as $title) {
            if ($request->title === $title) {
                return redirect()->back()->with('error', 'This title already used');
            }
        }
        $new_service = Service::create($new_service_fields);
        $new_service->paymentConditions()->attach($payment_conditions_identities);
        return redirect()->back()->with('success','Service/Services Created Successfully');
    }
}
