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
        return $this->belongsToMany(Client::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function service()
    {
        return Service::all()->find($this->service_id);
    }
    public function paymentCondition()
    {
        return PaymentCondition::all()->find($this->payment_condition_id);
    }
}
