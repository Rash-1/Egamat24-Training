<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = ['firstname', 'lastname', 'username', 'password'];


    public function providedServices()
    {
        return $this->belongsToMany(ProvidedService::class);

    }
}
