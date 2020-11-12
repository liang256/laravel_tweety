<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule as Rule;
use App\Models\User as User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
    	return view('profiles.show', [
    		'user'=>$user,
    		'tweets'=>$user->tweets()->withLikes()->latest()->paginate(12)
    	]);
    }

    public function edit(User $user)
    {
    	return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => [
                'string',
                'required', 
                'max:255', 
                'alpha_dash', 
                Rule::unique('users')->ignore($user)
            ],
            'name' => [
                'string',
                'required', 
                'max:255'
            ],
            'avatar' => [
                'file'
            ],
            'email' => [
                'email',
                'required', 
                'max:255', 
                Rule::unique('users')->ignore($user)
            ],
            'self_description' => [
                'string',
                'max:255',
                'required',
            ],
            'password' => [
                'string',
                'required', 
                'max:255', 
                'min:8',
                'confirmed'
            ]
        ]);

        if(request('avatar')){
            $attributes['avatar'] = request('avatar')
                ->storeAs('avatars', 'avatar_'.request()->user()->id.'.jpg'); 
        }
        
        $user->update($attributes);
        return redirect($user->path());
    }
}
