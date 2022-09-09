<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RequestedService extends Pivot
{
    use HasFactory;

    protected $table = 'requested_services';
    protected $fillable = ['client_id', 'provided_service_id', 'provider_id', 'status'];
    public $incrementing = true;

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public function client(){
        return Client::all()->find($this->client_id);
    }
    public function provided_service(){
        return ProvidedService::all()->find($this->provided_service_id);
    }

}
