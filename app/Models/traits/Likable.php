<?php

namespace App\Models\Traits;
use App\Models\User as User;
use App\Models\Like as Like;
use Illuminate\Database\Eloquent\Builder as Builder;

trait Likable
{
	public function scopeWithLikes(Builder $query)
	{
		$query->leftJoinSub(
			'select tweet_id, sum(liked) likes, sum(!liked) dislikes from likes group by tweet_id',
			'likes',
			'likes.tweet_id',
			'tweets.id'
		);
	}

	public function likes()
	{
		return $this->hasMany(Like::class);
	}

	public function like(User $user=Null, bool $like=True)
	{
		if($user==Null){
			return $this->likes()->updateOrCreate([
				'user_id'=>current_user()
			],[
				'liked'=>$like
			]);
		}else{
			return $this->likes()->updateOrCreate([
				'user_id'=>$user->id
			],[
				'liked'=>$like
			]);
		}
	}

	public function dislike(User $user=Null)
	{
		return $this->like($user, false);
	}

	public function deleteLikeBy(User $user)
	{
		Like::where([
			'user_id'=>$user->id,
			'tweet_id'=>$this->id
		])->delete();
	}

	public function isLikedBy(User $user)
	{
		return $this->likes()->where([
			'user_id'=>$user->id,
			'liked'=>True
		])->exists();
	}

	public function isDislikedBy(User $user)
	{
		return $this->likes()->where([
			'user_id'=>$user->id,
			'liked'=>False
		])->exists();
	}
}