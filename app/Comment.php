<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['user'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['song' => 'json'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithoutSelf($query)
    {
        return auth()->check() ? $query->where('user_id', '!=', auth()->id()) : $query;
    }
}
