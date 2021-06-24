<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rejection extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['shift_id','user_id','message'];

    public function shift(){
        return $this->belongsTo(Shift::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
