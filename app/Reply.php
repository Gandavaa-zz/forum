<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded =[];
    
    function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    function favorites(){
        return $this->morphMany(Favorite::class, 'favorited');
    }

    // isolation logic behind
    function favorite(){
        // herev nevtersen hereglegchiin user_id -r favorite-d bhgui bol uuniig hiine
        $attributes = ['user_id' => auth()->id()];

        if(! $this->favorites()->where($attributes)->exists()){
           return  $this->favorites()->create($attributes);
        }
    }

    public function isFavorited()
    {
        return $this->favorites()->where('user_id', auth()->id())->exists();
    }
}
