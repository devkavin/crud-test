<?php

namespace App\Jobs;

use App\Models\Team;
use Http;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class PushDataJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = Team::all()->toArray();

        Http::post(route('teams.pushUpdatedTeams'), ['data' => $data]); // Replace with the actual endpoint
    }
}
