<?php

namespace App\Jobs;

use App\Models\Team;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class saveTeamData implements ShouldQueue
{
    use Queueable;

    private $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Save the data to the database
        $teamData = [
            'id' => $this->data['id'],
            'conference' => $this->data['conference'],
            'division' => $this->data['division'],
            'city' => $this->data['city'],
            'name' => $this->data['name'],
            'full_name' => $this->data['full_name'],
            'abbreviation' => $this->data['abbreviation'],
        ];

        Team::updateOrCreate(['id' => $this->data['id']], $teamData);
    }
}
