<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Likable
{
    public function scopeWithLikes(Builder $query)
    {
        return $query->leftJoinSub(
            'SELECT tweet_id, SUM(liked) likes, SUM( ! liked ) dislikes FROM likes GROUP BY tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }

    public function like(User $user = null, $liked = true)
    {

        if ($this->isLikedBy($user)) {

            $this->unlink($user);
            return;
        }

        $this->likes()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'liked' => $liked
            ]
        );
    }

    public function unlink(User $user = null)
    {
        $this->likes->where('user_id', $user->id)->first()->delete();
    }

    public function dislike(User $user, $liked = false)
    {
        if ($this->isDislikedBy($user)) {

            $this->unlink($user);
            return;
        }

        $this->likes()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'liked' => $liked
            ]
        );
    }

    public function isLikedBy(User $user)
    {
        return (bool) $this
            ->likes()
            ->where('user_id', $user->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $this
            ->likes()
            ->where('user_id', $user->id)
            ->where('liked', false)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
