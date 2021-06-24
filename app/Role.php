<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Role extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $guarded = ['id'];

    public function users(){
        return $this->hasMany(User::class);
    }


}
