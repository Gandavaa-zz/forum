<?php

namespace App\Http\Controllers;

use App\User;
use App\Reply;
use App\Thread;
use App\Notifications\YouWereMentioned;
use App\Http\Requests\CreatePostRequest;


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
    function store($channelId, Thread $thread, CreatePostRequest $form){

		// #54 remove all codes to $form CreatePostForm
		
		// if(Gate::denies('create', new Reply)){
		// 	return response(
		// 		'Та дахин дахин нийтлэл оруулж байна, Түр хүлээнэ үү! :)', 429);
		// } 
		// request()->validate(['body' => 'required|spamfree']);
		
		return  $thread->addReply([	
			'body' => request('body'), 				
			'user_id' => auth()->id()			
		])->load('owner');

	}
	
	public function update(Reply $reply)
	{	
		$this->authorize('update', $reply);

		$this->validate(request(), ['body' => 'required|spamfree']);

		$reply->update(request(['body']));

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



}
