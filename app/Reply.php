<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable, RecordsActivity;
    
    protected $guarded =[];

    protected $with =['owner', 'favorites'];

    // #34 eposide appends return some function return as attribute current object
    protected $appends = ['favoritesCount', 'IsFavorited'];
    
    function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function path()
    {
        return $this->thread->path(); 
        // . "#reply-{$this->id}"
    }
    
 
}
