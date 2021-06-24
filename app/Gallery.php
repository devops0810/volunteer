<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Gallery extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['name','description','file_path','department_id'];

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
