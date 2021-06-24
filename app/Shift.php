<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shift extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['event_id','name','starts','ends','description'];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withPivot(['tasks']);
    }

    public function rejections(){
        return $this->hasMany(Rejection::class);
    }
}
