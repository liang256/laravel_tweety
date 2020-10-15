<?php

namespace App\Models\Traits;
use App\Models\User as User;

trait Followable
{
    // make link to other into follows table
    public function follow(User $user)
    {
        $this->following()->sync($user,false);
    }

    public function unfollow(User $user)
    {
        $this->following()->detach($user);
    }

    public function toggle(User $user)
    {
        if ($this->isFollow($user)){
            return $this->unfollow($user);
        }else{
            return $this->follow($user);
        }
    }

    // return following users of this user
    public function following()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

    public function isFollow(User $user)
    {
        return $this->following()->where('following_user_id',$user->id)->exists();
    }
}