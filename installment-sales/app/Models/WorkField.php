<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WorkField extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name'];

    public function providers()
    {
        return $this->hasMany(Provider::class);
    }

}
