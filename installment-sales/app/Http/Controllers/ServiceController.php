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
            'work_field_id' => auth('providers')->user()->work_field_id,
            'title' => $valid_data['title'],
            'description' => $valid_data['description'],
            'cash_price' => $valid_data['cash_price'],
        ];
        $payment_conditions_IDs = $request->payment_conditions ?? [];
        foreach ($provider_services_title as $title) {
            if ($request->title === $title) {
                return redirect()->back()->with('error', 'This title already used');
            }
        }
        $new_service = Service::create($new_service_fields);
        if (count($payment_conditions_IDs) > 0) {
            $new_service->paymentConditions()->attach($payment_conditions_IDs, ['provider_id' => auth('providers')->user()->id]);
        }
        return redirect()->back()->with('success', 'Service/Services Created Successfully');
    }

    public function delete(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'Service Deleted Successfully');
    }

    public function edit(Service $service)
    {
        return view('provider.services.edit', ['service' => $service]);
    }

    public function update(ServiceRequest $request, Service $service)
    {
        $provider_services_title = auth('providers')->user()->services()->pluck('title');
        $valid_data = $request->validated();
        $new_service_fields = [
            'provider_id' => auth('providers')->user()->id,
            'work_field_id' => auth('providers')->user()->work_field_id,
            'title' => $valid_data['title'],
            'description' => $valid_data['description'],
            'cash_price' => $valid_data['cash_price'],
        ];
        $payment_conditions_IDs = $request->payment_conditions ?? [];
        foreach ($provider_services_title as $title) {
            if ($request->title === $title) {
                return redirect()->back()->with('error', 'This title already used');
            }
        }
        $service->update($new_service_fields);
        $service->paymentConditions()->detach();
        if (count($payment_conditions_IDs) > 0) {
            $service->paymentConditions()->attach($payment_conditions_IDs, ['provider_id' => auth('providers')->user()->id]);
        }
        return redirect()->route('provider.dashboard')->with('success', 'Service Edited Successfully');
    }
}
