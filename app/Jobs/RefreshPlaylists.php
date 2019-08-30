<?php

namespace App\Jobs;

use App\Playlist;
use App\User;
use Facades\App\Spotify\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class RefreshPlaylists implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Playlist::upsert(
            collect(Client::authenticateFor($this->user)->getUserPlaylists())->filter(function ($playlist) {
                return $playlist['owner']['id'] === $this->user->id;
            })->map(function ($playlist) {
                return [
                    'id' => $playlist['id'],
                    'user_id' => $this->user->id,
                    'name' => $playlist['name'],
                    'cover' => collect($playlist['images'])->first()['url'],
                ];
            })->toArray(),
            'id'
        );
    }
}
