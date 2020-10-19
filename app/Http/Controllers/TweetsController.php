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

    	return redirect()->route('home');
    }

        public function index()
    {
        $tweets = auth()->user()->timeline();
        return view('tweets.index',[
            'tweets'=>$tweets
        ]);
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        return back();
    }

    public function update(Tweet $tweet)
    {
        $tweet->update([
            'body'=>request('body')
        ]);
        return redirect()->route('home');
    }

    public function edit(Tweet $tweet)
    {
        return view('tweets.edit', compact('tweet'));
    }
}
