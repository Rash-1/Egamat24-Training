<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Provider extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['workFiled_id', 'firstName', 'lastName', 'username', 'password'];

    public function workField()
    {
        $this->belongsTo(WorkField::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
