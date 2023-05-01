<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Game;
use App\Models\Player;
use App\Http\Controllers\Controller;
use App\Http\Requests\Game\RequireGame;
use App\Http\Requests\Player\CreatePlayerRequest;
use App\Http\Requests\Player\UpdatePlayerRequest;

class PlayersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequireGame $require)
    {
        $game = Game::findOrFail($require->game);

        $players = $game->players;

        return response()->json($players);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CreatePlayerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePlayerRequest $request)
    {
        $player             = new Player;
        $player->name       = $request->name;
        $player->ip_address = $request->ip_address;
        $player->save();

        return response()->json($player, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::findOrFail($id);

        return response()->json($player);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdatePlayerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayerRequest $request, $id)
    {
        $player = Player::findOrFail($id);
        $player->name = $request->name;
        $player->save();

        return response()->json($player);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return response()->json(null, 204);
    }
}
