<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DepartmentField extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $guarded = ['id'];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

}
