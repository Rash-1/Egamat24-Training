<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Service extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['provider_id','work_field_id','title','description','cash_price'];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function paymentConditions()
    {
        return $this->belongsToMany(PaymentCondition::class, 'provided_services')
            ->using(ProvidedService::class)
            ->withPivot('provider_id')
            ->as('provided-service');
    }
}
