<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Likable as Likable;

class Tweet extends Model
{
    use HasFactory, Likable;

    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tweetedBy($user)
    {
    	$this->user_id = $user->id;
    	$this->save();
    }
}
