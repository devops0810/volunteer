<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmailAttachment extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['email_id','file_name','file_path'];

    public function email(){
        return $this->belongsTo(Email::class);
    }
}
