<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Email extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['subject','message','notes','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withPivot('read');
    }

    public function emailAttachments(){
        return $this->hasMany(EmailAttachment::class);
    }

    public function departments(){
        return $this->belongsToMany(Department::class);
    }
}
