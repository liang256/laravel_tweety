<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
    	return view('profiles.show', [
    		'user'=>$user,
    		'tweets'=>$user->tweets()->latest()->get()
    	]);
    }

    public function edit(User $user)
    {
    	if(current_user()->isNot($user)){
    		return abort(404);
    	}
    	return view('profiles.edit',compact('user'));
    }
}
