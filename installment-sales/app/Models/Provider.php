<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['work_field_id', 'firstname', 'lastname', 'username', 'password'];

    public function workField()
    {
       return $this->belongsTo(WorkField::class,);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function paymentConditions(){
        return $this->hasMany(PaymentCondition::class);
    }
}
