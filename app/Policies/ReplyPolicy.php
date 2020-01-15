<?php

namespace Forum\Policies;

use Forum\User;
use Forum\Reply;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

     public function update(User $user, Reply $reply)
    {
        return $reply->user_id == $user->id;
    }
}
