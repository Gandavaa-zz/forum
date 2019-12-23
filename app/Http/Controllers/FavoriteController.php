<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Reply $reply ){

        // using polymorphic relation ashiglaj uusgej baina, busad utguud avtomat-r insert hiine

        return $reply->favorite();
       
        
    }
}