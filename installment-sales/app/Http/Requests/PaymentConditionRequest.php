<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentConditionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'description' => 'required|min:3|max:25|string',
            'total-increase-in-percentage' => 'required|integer',
            'number-of-instalments' => 'required|integer',
            'duration-of-each-instalment' => 'required|integer',
        ];
    }
}
