<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Game;
use App\Http\Controllers\Controller;
use App\Http\Requests\Game\RequireGame;
use App\Http\Requests\Player\CreatePlayerRequest;
use App\Http\Requests\Player\RequirePlayer;
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
    public function index()
    {

        $players = $this->playerRepository->getAll();

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
        if ($player) {
            return response()->json($player);
        }
        return response()->json(['message' => 'not found']);
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
        $player = $this->playerRepository->getOne($id);
        if ($player) {
            $this->playerRepository->update($id, ['name' => $request->name]);
            return response()->json($player);
        }
        return response()->json(['message' => 'not found']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player = $this->playerRepository->delete($id);
        if ($player) {
            return response()->json(null, 204);
        }
        return response()->json(['message' => 'not found']);
    }
}
