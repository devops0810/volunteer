<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Download extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable =  ['user_id','department_id','name','description'];

    public function downloadFiles(){
        return $this->hasMany(DownloadFile::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
