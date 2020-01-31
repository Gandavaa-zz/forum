<?php

namespace App\Policies;

use App\User;
use App\Reply;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

     public function update(User $user, Reply $reply)
    {
        return $reply->user_id == $user->id;
    }

    public function create(User $user)
    {
        // not passed need fresh instance of reply
        if(! $lastReply = $user->fresh()->lastReply){
           
            return true;
        }            
        
        return ! $lastReply->wasJustPublished();
         
        // if(! $lastReply) return true; return ! $lastReply->wasJustPublished();
        // return ! $lastReply || ! $lastReply->wasJustPublished();
        
    }
}
