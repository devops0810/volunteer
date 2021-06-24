<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Sms extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['user_id','message','notes'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function departments(){
        return $this->belongsToMany(Department::class);
    }
}
