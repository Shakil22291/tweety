<?php

namespace App\Models;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        if ($this->following($user)) {
            return $this->unfollow($user);
        }

        $this->follow($user);
    }

    public function following(User $user)
    {
        return (bool) $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function unFollows()
    {
        $friends = $this->follows->pluck('id');

        $friends->push(auth()->user()->id);

        return User::whereNotIn('id', $friends)->get();
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function followers()
    {
        $followersId = Follow::where('following_user_id', $this->id)->pluck('user_id');
        
        return User::whereIn('id', $followersId)->get();
    }
}
