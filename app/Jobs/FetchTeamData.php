<?php

namespace App\Jobs;

use App\Events\TeamDataFetched;
use App\Models\Team;
use DB;
use Exception;
use Http;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class FetchTeamData implements ShouldQueue
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

        // $response = Http::withHeaders(
        //     [
        //         'Authorization' => $token,
        //     ]
        // )
        //     ->acceptJson()
        //     ->get($url);

        // if ($response->failed()) {
        //     throw new \Exception('Failed to fetch team data');
        // }

        // $fetchedData = $response->json()['data'];

        // foreach ($fetchedData as $team) {
        //     $teamData = [
        //         'id' => $team['id'],
        //         'conference' => $team['conference'],
        //         'division' => $team['division'],
        //         'city' => $team['city'],
        //         'name' => $team['name'],
        //         'full_name' => $team['full_name'],
        //         'abbreviation' => $team['abbreviation'],
        //     ];

        //     Team::updateOrCreate(['id' => $team['id']], $teamData);
        // }

        try {
            // Fetch data from external API
            $response = Http::withHeaders([
                'Authorization' => $token,
            ])->acceptJson()->get($url);

            // Check if the response was successful
            if ($response->failed()) {
                throw new Exception('Failed to fetch team data');
            }

            $fetchedData = $response->json()['data'];

            // Begin a database transaction
            DB::beginTransaction();

            // Array to hold the team data for batch insertion or update
            $teamsToUpdate = [];

            foreach ($fetchedData as $team) {
                $teamsToUpdate[] = [
                    'id' => $team['id'],
                    'conference' => $team['conference'],
                    'division' => $team['division'],
                    'city' => $team['city'],
                    'name' => $team['name'],
                    'full_name' => $team['full_name'],
                    'abbreviation' => $team['abbreviation'],
                    'updated_at' => now(),
                ];
            }

            // Perform bulk insert or update using upsert to handle existing teams
            // This assumes the `id` column is unique
            Team::upsert($teamsToUpdate, ['id'], ['conference', 'division', 'city', 'name', 'full_name', 'abbreviation']);

            // Commit the transaction
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            logger()->error("Error fetching or saving team data: " . $e->getMessage());
            throw $e;
        }
    }
}
