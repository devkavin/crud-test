<?php

namespace App\Http\Controllers;

use App\Jobs\FetchTeamData;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TeamController extends Controller
{
    public function getTeams()
    {
        $link = 'https://api.balldontlie.io/v1/teams';
        FetchTeamData::dispatch($link);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $teamsArray = [
        //     [
        //         'conference' => 'Eastern',
        //         'division' => 'Atlantic',
        //         'city' => 'Boston',
        //         'name' => 'Celtics',
        //         'full_name' => 'Boston Celtics',
        //         'abbreviation' => 'BOS',
        //     ],
        //     [
        //         'conference' => 'Eastern',
        //         'division' => 'Central',
        //         'city' => 'Chicago',
        //         'name' => 'Bulls',
        //         'full_name' => 'Chicago Bulls',
        //         'abbreviation' => 'CHI',
        //     ],
        //     [
        //         'conference' => 'Eastern',
        //         'division' => 'Southeast',
        //         'city' => 'Miami',
        //         'name' => 'Heat',
        //         'full_name' => 'Miami Heat',
        //         'abbreviation' => 'MIA',
        //     ],
        // ];

        $teams = Team::all();

        return Inertia::render('Teams/Index', [
            'teams' => $teams,
        ]);
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return Inertia::render('Teams/Show', [
            'team' => $team,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
