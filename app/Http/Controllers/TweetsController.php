<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet as Tweet;

class TweetsController extends Controller
{
    public function store()
    {
    	//echo request('body');
    	$tweet = new Tweet([
    		'body'=>request('body'),
    		'user_id'=>auth()->user()->id
    	]);
    	$tweet->save();

    	return redirect()->back();
    }
}
