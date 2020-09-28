<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet as Tweet;

class TweetsController extends Controller
{
    public function store()
    {
    	$attributes = request()->validate(['body'=>'required|max:255']);
    	$tweet = new Tweet([
    		'body'=>$attributes['body'],
    		'user_id'=>auth()->user()->id
    	]);
    	$tweet->save();

    	return redirect()->back();
    }
}
