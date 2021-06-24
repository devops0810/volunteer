<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ForumAttachment extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['forum_thread_id','file_path'];

    public function forumThread(){
        return $this->belongsTo(ForumThread::class);
    }

}
