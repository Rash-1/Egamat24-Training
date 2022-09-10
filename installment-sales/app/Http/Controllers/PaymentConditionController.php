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
            'total_increase_in_percentage'=>$valid_data['total-increase-in-percentage'],
            'number_of_instalments'=>$valid_data['number-of-instalments'],
            'duration_of_each_instalment'=>$valid_data['duration-of-each-instalment'],
            'description' => $valid_data['description'],
        ];
        foreach (auth('providers')->user()->paymentConditions()->get()->pluck('description') as $description) {
            if ($valid_data['description'] === $description) {
                return redirect()->back()->with('error', 'You Already Have Payment Condition With Same Description');
            }
        }
        PaymentCondition::create($new_payment_condition);
        return redirect()->back()->with('success', 'Payment Condition Created Successfully');
    }

//    public function delete(PaymentCondition $paymentCondition)
//    {
//        if (!$paymentCondition->is_default){
//            $paymentCondition->delete();
//            return redirect()->back()->with('success', 'Payment Condition Deleted Successfully');
//        }
//        return redirect()->back()->with('error', 'This Is A Default Payment Condition,You Can Not Delete It');
//    }
//    public function edit(PaymentCondition $paymentCondition){
//        if (!$paymentCondition->is_default){
//            return view('provider/payment-conditions/edit',['payment_condition'=>$paymentCondition]);
//        }
//        return redirect()->back()->with('error', 'This Is A Default Payment Condition,You Can Not Edit It');
//    }
//    public function update(PaymentCondition $paymentCondition, PaymentConditionRequest $request)
//    {
//        $valid_data = $request->validated();
//        $paymentCondition->update([
//            'description'=>$valid_data['description'],
//            'total_increase_in_percentage'=>$valid_data['total-increase-in-percentage'],
//            'number_of_instalments'=>$valid_data['number-of-instalments'],
//            'duration_of_each_instalment'=>$valid_data['duration-of-each-instalment']
//        ]);
//        return redirect()->route('provider.dashboard')->with('success','Payment Condition Edited Successfully');
//    }
}
