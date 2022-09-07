<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ProvidedService extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['service_id','payment_condition_id'];

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
