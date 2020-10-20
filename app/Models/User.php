<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use tidy;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
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

    public function getAvatarAttribute($value)
    {
        return $value ? '/storage/' . $value : '/images/default-avatar.jpeg';
    }

    public function getBannerAttribute($value)
    {
        return asset($value ? 'storage/' . $value : 'images/default-profile-banner.jpg');
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->with('user')->withLikes();
    }

    public function timeline()
    {
        $friends = auth()->user()->follows->pluck('id');
        return Tweet::whereIn('user_id', $friends)
            ->orWhere('user_id', auth()->user()->id)
            ->latest()
            ->withLikes()
            ->with('user')
            ->get();
    }

    public function path()
    {
        return route('profile', $this);
    }
}
