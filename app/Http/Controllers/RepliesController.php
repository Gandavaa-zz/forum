<?php

namespace Forum\Http\Controllers;

use Forum\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');

	}

    function store($channelId, Thread $thread){
		
		$this->validate(request(), ['body' => 'required']);

        $thread->addReply([

			'body' => request('body'), 
			
			'user_id' => auth()->id()
		
		]);

		return back();

    }
}
