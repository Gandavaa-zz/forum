<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filters\ThreadFilters;

class Thread extends Model
{
    use RecordsActivity;

    protected $guarded =[];

    protected $with = ['creator', 'channel'];

    protected static function boot()
    {
        parent::boot();
        // #39 git ride of this chunk no longer need it
        // static::addGlobalScope('replyCount', function ($builder) {
        //     $builder->withCount('replies');
        // });

        //when deleteing thread its should be deleting replies too
        static::deleting(function ($thread){
            // 28 updating here delete each reply also fires recrods activity delete called
            $thread->replies->each->delete();
            // $thread->replies()->each(function($reply){
            //     $reply->delete();
            // });
        });
        
    }

    public function path(){
        return "/threads/{$this->channel->slug}/{$this->id}";
    }
    
    public function replies(){
      
        return $this->hasMany(Reply::class)
                ->withCount('favorites')
                ->withCount('owner');

    }

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function channel(){
        return $this->belongsTo(Channel::class);

    }

    /**
     * Add reply to the tread
     * @parem $reply
     * @return Model
     */
    public function addReply($reply)
    {
    	return $this->replies()->create($reply);
    }
    
    public function scopeFilter($query, ThreadFilters $filters){
        return $filters->apply($query);
    }

}
