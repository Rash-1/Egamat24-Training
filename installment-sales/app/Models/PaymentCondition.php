<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PaymentCondition extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['totalCost', 'numberOfInstalments', 'eachInstalmentAmount', 'description'];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function provider(){
        return $this->belongsTo(Provider::class);
    }
}
