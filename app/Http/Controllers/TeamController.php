<?php

namespace App\Http\Controllers;

use App\Jobs\ImportNBAData;
use App\Jobs\saveTeamData;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('teams.index', compact('teams'));
    }
    public function getTeams()
    {
        $link = "https://api.balldontlie.io/v1/teams?verify=0";
        ImportNBAData::dispatch($link)->delay(now()->addSeconds(10));
        return redirect()->route('teams.index');
    }
    public function pushUpdatedTeams()
    {
        $teams = Team::all();
        foreach ($teams as $team) {
            // add a column called status and set it to 'updated'
            $team['status'] = 'updated';
        }
        // redirect
        return view('teams.updated', compact('teams'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'conference' => 'required',
            'division' => 'required',
            'city' => 'required',
            'name' => 'required',
            'full_name' => 'required',
            'abbreviation' => 'required',
        ]);

        Team::create($request->all());

        return redirect()->route('teams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        try {
            return view('teams.show', compact('team'));
        } catch (\Exception $e) {
            return redirect()->route('teams.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required',
            'conference' => 'required',
            'division' => 'required',
            'city' => 'required',
            'full_name' => 'required',
            'abbreviation' => 'required',
        ]);

        $request->request->add(['id' => $team->id]);

        // $team->update($request->all());
        saveTeamData::dispatch($request->all())->delay(now()->addSeconds(10));

        return redirect()->route('teams.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index');
    }
}
