<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
 
class Reply extends Model
{
    use Favoritable, RecordsActivity;
    
    protected $guarded =[];

    protected $with =['owner', 'favorites'];

    // #34 eposide appends return some function return as attribute current object
    protected $appends = ['favoritesCount', 'IsFavorited'];

    // #39 replies_count must be incremented that's why added here
    protected static function boot(){
        parent::boot();

        static::created(function($reply){
            $reply->thread->increment('replies_count'); 
        });

        static::deleted(function($reply){
            $reply->thread->decrement('replies_count'); 
        });
    }
    
    function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function wasJustPublished()
    {
        // how to logic is
        return $this->created_at->gt(Carbon::now()->subMinute());
    }

    // #57 is created here

    public function mentionedUsers()
    {
        preg_match_all('/\@([^\s\.]+)/', $this->body, $matches);

        return $matches[1];
    }

    public function path()
    {
        return $this->thread->path() . "#reply-{$this->id}";
    }
    
 
}
