<?php

namespace App\Models;

use App\Events\ProviderRegistered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['work_field_id', 'firstname', 'lastname', 'username', 'password'];
    protected $dispatchesEvents = [
        'created'=>ProviderRegistered::class,
    ];

    public function workField()
    {
        return $this->belongsTo(WorkField::class,);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function paymentConditions()
    {
        return $this->hasMany(PaymentCondition::class);
    }

    public function providedServices()
    {
        return $this->hasMany(ProvidedService::class);
    }
    public function requestedServices(){
        return $this->hasMany(RequestedService::class);
    }
}
