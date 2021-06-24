<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use Notifiable, UsesTenantConnection;
       protected $fillable = ['department_id','name','venue','description','event_date'];

       public function department(){
           return $this->belongsTo(Department::class);
       }

       public function shifts(){
           return $this->hasMany(Shift::class);
       }


        public function rejections(){
            return $this->hasManyThrough(Rejection::class,Shift::class);
        }

}
