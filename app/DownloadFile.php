<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DownloadFile extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['download_id','file_path'];

    public function download(){
        return $this->belongsTo(Download::class);
    }
}
