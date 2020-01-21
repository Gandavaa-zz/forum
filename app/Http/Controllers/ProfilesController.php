<?php

namespace App\Http\Controllers;

use App\User;
use App\Activity;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    function show(User $user)
    {
        // return Activity::feed($user, 50);

    	return view('profiles.show', [
            'profileUser' => $user, 
            'activities' => Activity::feed($user, 50)
    	]);
    } 

}
