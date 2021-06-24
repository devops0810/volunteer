<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SmsGateway extends Model
{
    use Notifiable, UsesTenantConnection;
    //
    protected $fillable = ['gateway_name','url','code','action'];

    public function smsGatewayFields(){
        return $this->hasMany(SmsGatewayField::class);
    }

}
