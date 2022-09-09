<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PaymentCondition extends Authenticatable
{
    use HasFactory;

    protected $table = 'payment_conditions';

    protected $fillable = ['provider_id','total_increase_in_percentage', 'number_of_instalments', 'duration_of_each_instalment', 'description'];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'provided_services')
            ->using(ProvidedService::class)
            ->withPivot('provider_id')
            ->as('provided-service');
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
