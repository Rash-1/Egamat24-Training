<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentConditionRequest;
use App\Models\PaymentCondition;

class PaymentConditionController extends Controller
{
    public function define(PaymentConditionRequest $request)
    {
        $valid_data = $request->validated();
        $new_payment_condition = [
            'provider_id' => auth('providers')->user()->id,
            'total_cost' => $valid_data['total-cost'],
            'number_of_instalments' => $valid_data['number-of-instalments'],
            'each_instalment_amount' => $valid_data['each-instalment-amount'],
            'description' => $valid_data['description'],
        ];
        foreach (auth('providers')->user()->paymentConditions()->get()->pluck('description') as $description){
            if ($valid_data['description'] === $description){
                return redirect()->back()->with('error','You Already Have Payment Condition With Same Description');
            }
        }
        PaymentCondition::create($new_payment_condition);
        return redirect()->back()->with('success','Payment Condition Created Successfully');
    }
    public function delete(PaymentCondition $paymentCondition){
        $paymentCondition->delete();
        return redirect()->back()->with('success','Payment Condition Deleted Successfully');
    }
}
