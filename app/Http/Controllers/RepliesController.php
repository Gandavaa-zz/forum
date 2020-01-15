<?php

namespace Forum\Http\Controllers;

use Forum\Reply;
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

        $reply = $thread->addReply([

			'body' => request('body'), 
			
			'user_id' => auth()->id()
		
		]);
	    // #37 add reply from axios
		if(request()->expectsJson()){
			// load with owner
			return $reply->load('owner');
		}

		return back()->with('flash', "Таны бичсэн хариу аль хэдийн хадгалагдлаа.");

	}
	
	// 31 Тухайн хүн өөрийнхөөс өөр утгуудыг нэмэх ёсгүй
	public function destroy(Reply $reply)
	{
		// if( $reply->user_id != aut()->id()){
		// 	return response([], 403);
		// }
		$this->authorize('update', $reply);

		$reply->delete();

		if(request()->expectsJson()){
			return response(['status' =>'Reply deleted']);
		}

		return back();
	}

	public function update(Reply $reply)
	{
		$reply->update(request(['body']));

	}
}
