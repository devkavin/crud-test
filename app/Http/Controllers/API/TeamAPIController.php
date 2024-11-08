<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\APIHelper;
use App\Jobs\FetchTeamData;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamAPIController extends Controller
{
    public function fetchTeams()
    {
        $link = 'https://api.balldontlie.io/v1/teams';
        try {
            FetchTeamData::dispatch($link);
            return APIHelper::makeApiResponse(true, 'Teams fetched successfully', null, 200);
        } catch (\Exception $e) {
            return APIHelper::makeApiResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $teams = Team::all();
            return APIHelper::makeApiResponse(true, 'Teams retrieved successfully', $teams, 200);
        } catch (\Exception $e) {
            return APIHelper::makeApiResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validation_schema = [
                'conference' => 'required|string',
                'division' => 'required|string',
                'city' => 'required|string',
                'name' => 'required|string',
                'full_name' => 'required|string',
                'abbreviation' => 'required|string',
            ];

            $validator = APIHelper::validateRequest($validation_schema, $request->all());
            if ($validator['errors']) {
                return APIHelper::makeApiResponse(false, $validator['error_messages'], null, 400);
            }
        } catch (\Exception $e) {
            return APIHelper::makeApiResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
