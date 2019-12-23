<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

trait Favoritable
{
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
        // fixed to queries to eloquend eggier loading
        return !! $this->favorites->where('user_id', auth()->id())->count();
    }

    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
}