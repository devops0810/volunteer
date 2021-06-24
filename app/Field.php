<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Field extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $guarded = ['id'];

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('value');
    }

}
