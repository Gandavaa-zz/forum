<?php

namespace Forum\Policies;

use Forum\User;
use Forum\Thread;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    // You can add it admin has all permissions

    // public function before($user)
    // {
    //     if ($user->name === 'Ganaa'){
    //         return true;
    //     }
    // }
    
    /**
     * Determine whether the user can view any = threads.
     *
     * @param  \Forum\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the = thread.
     *
     * @param  \Forum\User  $user
     * @param  \Forum\=Thread  $=Thread
     * @return mixed
     */
    public function view(User $user, Thread $Thread)
    {
        //
    }

    /**
     * Determine whether the user can create = threads.
     *
     * @param  \Forum\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the = thread.
     *
     * @param  \Forum\User  $user
     * @param  \Forum\Thread  $=Thread
     * @return mixed
     */
    public function update(User $user, Thread $thread)
    {
        return $thread->user_id == $user ->id;
    }

    /**
     * Determine whether the user can delete the = thread.
     *
     * @param  \Forum\User  $user
     * @param  \Forum\=Thread  $=Thread
     * @return mixed
     */
    public function delete(User $user, Thread $Thread)
    {
        //
    }

    /**
     * Determine whether the user can restore the = thread.
     *
     * @param  \Forum\User  $user
     * @param  \Forum\=Thread  $=Thread
     * @return mixed
     */
    public function restore(User $user, Thread $Thread)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the = thread.
     *
     * @param  \Forum\User  $user
     * @param  \Forum\=Thread  $=Thread
     * @return mixed
     */
    public function forceDelete(User $user, Thread $Thread)
    {
        //
    }
}
