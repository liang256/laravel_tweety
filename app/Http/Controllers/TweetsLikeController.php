<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet as Tweet;

class TweetsLikeController extends Controller
{
    public function store(Tweet $tweet)
    {
    	$tweet->like(current_user());
    	return back();
    }

    public function destroy(Tweet $tweet)
    {
    	$tweet->dislike(current_user());
    	return back();
    }
}
