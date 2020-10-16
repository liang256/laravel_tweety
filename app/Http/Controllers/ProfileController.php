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
    		'tweets'=>$user->tweets()->latest()->get()
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
            'password' => [
                'string',
                'required', 
                'max:255', 
                'min:8',
                'confirmed'
            ]
        ]);

        $attributes['avatar'] = request('avatar')->store('avatars');
        $user->update($attributes);
        return redirect($user->path());
    }
}
