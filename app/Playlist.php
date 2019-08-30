<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use \Staudenmeir\LaravelUpsert\Eloquent\HasUpsertQueries;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['url'];

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute() : string
    {
        return "https://open.spotify.com/playlist/{$this->id}";
    }
}
