<?php

namespace App\Providers;

use App\Events\NBADataImported;
use App\Listeners\sendUpdatedTeams;
use Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(NBADataImported::class, sendUpdatedTeams::class);
    }
}
