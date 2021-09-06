<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use App\Models\DraftPick;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DraftPickController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Draft $draft)
    {
        return $draft->picks()->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teamPicks(Team $team)
    {
        return $team->picks()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @param  Draft  $draft
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Draft $draft)
    {
        $player = $request->input('player');
        $team = $request->input('team');
        $count = $draft->picks()->count();
        $draft->picks()->create([
            'player_id' => $player,
            'team_id' => $team,
            'round' => 1,
            'pick_number' => $count + 1,
        ]);
        return $draft->picks()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DraftPick  $draftPick
     * @return \Illuminate\Http\Response
     */
    public function show(DraftPick $draftPick)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DraftPick  $draftPick
     * @return \Illuminate\Http\Response
     */
    public function edit(DraftPick $draftPick)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DraftPick  $draftPick
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DraftPick $draftPick)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DraftPick  $draftPick
     * @return \Illuminate\Http\Response
     */
    public function destroy(DraftPick $draftPick)
    {
        //
    }
}
