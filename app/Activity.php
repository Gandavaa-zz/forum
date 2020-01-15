<?php

namespace Forum;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guard =[];

    protected $fillable = ['user_id', 'type'];

    public function subject(){
        
        return $this->morphTo();

    }

    // #27 added
    static function feed($user, $take = 50)
    {
        return static::where('user_id', $user->id)
                ->latest()
                ->with('subject')
                ->take($take)
                ->get()
                ->groupBy(function ($activity){
                    return $activity->created_at->format('Y-m-d');
                });
    }


}
