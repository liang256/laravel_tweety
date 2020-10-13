<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    //return avatar photo api of this user
    public function getAvatar()
    {
        //https://avatars.dicebear.com/api/male/hhh.svg?w=40&h=40
        return "https://avatars.dicebear.com/api/male/" .$this->email.".svg?w=40&h=40";
    }

    // return tweets ordered by desc by this user
    public function timeline()
    {
        $following_ids = $this->following()->pluck('id');
        return Tweet::whereIn('user_id',$following_ids)
            ->orWhere('user_id',$this->id)
            ->latest()
            ->get();

        //return Tweet::where('user_id',$this->id)->latest()->get();
    }

    // make link to other into follows table
    public function follow(User $user)
    {
        $this->following()->sync($user,false);
    }

    // return following users of this user
    public function following()
    {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
