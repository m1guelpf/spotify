<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['playlists', 'comments'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['activity', 'following_count', 'follower_count', 'followed'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }
    public function getActivityAttribute()
    {
        return [];
    }

    public function getFollowingCountAttribute()
    {
        return $this->following()->count();
    }

    public function getFollowerCountAttribute()
    {
        return $this->followers()->count();
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'following', 'followed_user_id', 'following_user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'following', 'following_user_id', 'followed_user_id');
    }

    public function getFollowedAttribute() : bool
    {
        return auth()->check() ? auth()->user()->following->contains($this) : false;
    }
}
