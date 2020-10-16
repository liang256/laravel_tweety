<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Traits\Followable as Followable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
        if($this->avatar){
            return asset($this->avatar);
            //return "/storage/{$this->avatar}"; 
        }
        
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

    public function path($append='')
    {
        $path = route('profile',$this->username);
        return $append ? "{$path}/{$append}":"{$path}";
    }
}
