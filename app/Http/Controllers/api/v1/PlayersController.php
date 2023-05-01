<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Game;
use App\Http\Controllers\Controller;
use App\Http\Requests\Game\RequireGame;
use App\Http\Requests\Player\CreatePlayerRequest;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Repositories\PlayerRepository;

class PlayersController extends Controller
{
    protected $playerRepository;

    public function __construct(PlayerRepository $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RequireGame $require)
    {
        $game = Game::findOrFail($require->game);

        $players = $this->playerRepository->getAll($game);

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
        $player = $this->playerRepository->create($request->name, $request->ip_address);

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
        $player = $this->playerRepository->getOne($id);

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
        $this->playerRepository->update($id, ['name' => $request->name]);

        $player = $this->playerRepository->getOne($id);

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
        $this->playerRepository->delete($id);

        return response()->json(null, 204);
    }
}
