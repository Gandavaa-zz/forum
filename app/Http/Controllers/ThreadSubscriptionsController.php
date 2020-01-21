<?php
// created #40-41 made this one
// subscription controller when button clicked stored there

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ThreadSubscriptionsController extends Controller
{
     public function store($channelId, Thread $thread)
    {
        $thread->subscribe();
    }
     public function destroy($channelId, Thread $thread)
    {
        $thread->unsubscribe();
    }
}
