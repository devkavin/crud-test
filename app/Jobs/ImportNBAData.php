<?php

namespace App\Jobs;

use App\Models\Team;
use Http;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Notification;

class ImportNBAData implements ShouldQueue
{
    use Queueable;

    private $link;

    /**
     * Create a new job instance.
     */
    public function __construct($link)
    {
        $this->link = $link;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {


        $url = $this->link;
        $token = env('API_AUTH_TOKEN');

        // Make the API call with the Authorization token
        $response = Http::withHeaders([
            'Authorization' => $token,
        ])
            ->acceptJson()
            ->get($url);

        if ($response->failed()) {
            Notification::error('Failed to fetch data from the NBA API');
        }
        $fetchedData = $response->json()['data'];

        foreach ($fetchedData as $team) {
            $teamData = [
                'id' => $team['id'],
                'conference' => $team['conference'],
                'division' => $team['division'],
                'city' => $team['city'],
                'name' => $team['name'],
                'full_name' => $team['full_name'],
                'abbreviation' => $team['abbreviation'],
            ];
            // send data to teams.index
            // return redirect()->route('teams.index')->with('data', $teamData);

            Team::updateOrCreate(['id' => $team['id']], $teamData);
        }
    }
}
