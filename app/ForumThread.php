<?php

namespace App;

use Hyn\Tenancy\Traits\UsesTenantConnection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ForumThread extends Model
{
    use Notifiable, UsesTenantConnection;
    protected $fillable = ['forum_topic_id','user_id','content'];

    public function forumTopic(){
        return $this->belongsTo(ForumTopic::class);
    }

    public function forumAttachments(){
        return $this->hasMany(ForumAttachment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
