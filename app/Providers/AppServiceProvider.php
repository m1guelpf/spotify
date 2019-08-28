<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();

        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });

        Inertia::share([
            'app' => [
                'name' => config('app.name')
            ],
            'auth' => function () {
                return [
                    'check' => auth()->check(),
                    'user' => auth()->user(),
                ];
            }
        ]);
    }
}
