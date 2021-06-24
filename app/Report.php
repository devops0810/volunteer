<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Report extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['event_id','user_id','content'];

    public function event(){
        return $this->belongsTo(Event::class);
    }


}
