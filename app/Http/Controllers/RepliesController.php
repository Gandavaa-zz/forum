<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Thread;

class RepliesController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');

	}

	function index($channelId, Thread $thread){
		return $thread->replies()->paginate(10);
	}

	/** 
	 * Persist a new Reply
	 * 
	 * @param integer 						$channelId
	 * @param Thread 						$thread
	 * @param Spam 							$spam
	 * @return \Illuminate\Http\RedirectResponse
	 * 
	 */
    function store($channelId, Thread $thread){

		try {
			request()->validate(['body' => 'required|spamfree']);
			
			$reply = $thread->addReply([
	
				'body' => request('body'), 
				
				'user_id' => auth()->id()
			
		]);			
		} catch (\Exception $e) {
			return response('Уучлаарай, Таны оруулсан комментыг яг одоо нийтлэх боломжгүй байна.', 422);
		}
		
	    
	    return $reply->load('owner');

		

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
		$this->authorize('update', $reply);

		try {
			
			$this->validate(request(), ['body' => 'required|spamfree']);

			$reply->update(request(['body']));

		} catch (\Exception $e) {

			return response('Уучлаарай, Таны оруулсан комментыг яг одоо хадгалах боломжгүй байна.', 422);
		}

	}

}
