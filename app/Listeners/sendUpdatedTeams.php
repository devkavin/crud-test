<?php

namespace App\Listeners;

use App\Events\NBADataImported;
use Http;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldQueueAfterCommit;
use Illuminate\Queue\InteractsWithQueue;

class sendUpdatedTeams implements ShouldQueueAfterCommit
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NBADataImported $event): void
    {
        // Send the updated teams to the frontend
        $url = route('teams.pushUpdatedTeams');

        try {
            Http::post($url, ['data' => $event->status]);
        } catch (\Exception $e) {
            // Log the error
            logger()->error($e->getMessage());
        }
    }
}
