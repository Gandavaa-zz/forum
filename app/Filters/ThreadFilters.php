<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

class ThreadFilters extends Filters
{
	// #39 unanswered thread nemlee
    protected $filters = ['by', 'popular', 'unanswered'];
   
    protected function by($username){
        
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);

    }

    protected function popular()
	{
		 $this->builder->getQuery()->orders = [];
		 
		 return $this->builder->orderBy('replies_count', 'desc');
	}

	// #39 unanswered thread added here
	protected function unanswered()
	{
		 $this->builder->getQuery()->orders = [];
		 
		 return $this->builder->where('replies_count', 0);
	}
}