<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProvidedService extends pivot
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'provided_services';

    protected $fillable = ['service_id', 'payment_condition_id', 'provider_id'];

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'requested_service')
            ->using(RequestedService::class)
            ->withPivot(['provider_id', 'status']);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function service()
    {
        return Service::where('id',$this->service_id)->get()->first();
    }
    public function paymentCondition()
    {
        return PaymentCondition::where('id',$this->payment_condition_id)->get()->first();
    }
}
