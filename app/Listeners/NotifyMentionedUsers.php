<?php

namespace App\Listeners;

use App\User;
use App\Events\ThreadReceivedNewReply;
use App\Notifications\YouWereMentioned;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyMentionedUsers
{
    
    /**
     * Handle the event.
     *
     * @param  ThreadReceivedNewReply  $event
     * @return void
     */
    public function handle(ThreadReceivedNewReply $event)
    {
        // Inspect the body of the reply username mentins
		$mentionedUsers = $event->reply->mentionedUsers();

		// And then foreach mentionsd user, notify them.
		foreach ($mentionedUsers as $name) {

            collect($event->reply->mentionedUsers())
                ->map(function ($name){
                    return User::where('name', $name)->first();
                })
                ->filter()
                ->each(function ($user) use ($event) {
                    $user->notify(new YouWereMentioned($event->reply));
                }); 
			
			// $user = User::whereName($name)->first();
			
			// if ($user){
			// 	$user->notify(new YouWereMentioned($event->reply));
			// }
		}
    }
}
