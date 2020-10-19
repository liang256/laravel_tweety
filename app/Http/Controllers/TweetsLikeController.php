<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet as Tweet;

class TweetsLikeController extends Controller
{
    public function store(Tweet $tweet)
    {
        if($tweet->isLikedBy(current_user())){
            $tweet->deleteLikeBy(current_user());
            return back();
        }

    	$tweet->like(current_user());
    	return back();
    }

    public function destroy(Tweet $tweet)
    {
        if($tweet->isDislikedBy(current_user())){
            $tweet->deleteLikeBy(current_user());
            return back();
        }

    	$tweet->dislike(current_user());
    	return back();
    }
}
