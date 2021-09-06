<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Draft $draft)
    {
        $players = $draft->players();

//        $players = Player::where(['draft' => 1]);

        return $players->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Player  $draftPlayer
     * @return \Illuminate\Http\Response
     */
    public function show(Player $draftPlayer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $draftPlayer
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $draftPlayer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $draftPlayer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $draftPlayer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $draftPlayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $draftPlayer)
    {
        //
    }
}
