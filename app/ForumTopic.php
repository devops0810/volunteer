<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ForumTopic extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['user_id','department_id','topic'];

    public function forumThreads(){
        return $this->hasMany(ForumThread::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function forumAttachments(){
        return $this->hasManyThrough(ForumAttachment::class,ForumThread::class);
    }

}
