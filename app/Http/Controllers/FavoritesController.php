<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Favorite;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Reply $reply ){

        // using polymorphic relation ashiglaj uusgej baina, busad utguud avtomat-r insert hiine

         $reply->favorite();

         return back();
    }
    
    public function destroy(Reply $reply ){
        
        $reply->unfavorite();

    }


}
