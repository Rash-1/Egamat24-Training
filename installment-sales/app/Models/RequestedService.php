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
        return Client::where('id',$this->client_id)->get()->first();
    }
    public function provided_service(){
        return ProvidedService::where('id',$this->provided_service_id)->get()->first();
    }

}
