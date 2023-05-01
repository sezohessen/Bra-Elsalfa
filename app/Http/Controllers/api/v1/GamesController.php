<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Game\StoreGameRequest;
use App\Models\Game;
use App\Models\GameTheme;
use App\Models\Player;
use App\Repositories\GameRepository;
use App\Repositories\PlayerRepository;
use Illuminate\Http\Request;
use Faker\Factory;
use Illuminate\Support\Str;


class GamesController extends Controller
{
    protected $gameRepository;
    protected $playerRepository;

    public function __construct(GameRepository $gameRepository, PlayerRepository $playerRepository)
    {
        $this->gameRepository   = $gameRepository;
        $this->playerRepository = $playerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreGameRequest $request)
    {
    $ip_address = $request->player_ip;
        $player     = Player::where('ip_address', $ip_address)->first();
        if (!$player) {
            $faker = Factory::create();
            $player = $this->playerRepository->create([
                'name'       => $request->player_name ?: $faker->name,
                'ip_address' => $ip_address
            ]);
        } else {
            $player = $this->playerRepository->update($player->id, ['name' => $request->name ?: $player->name]);
        }

        $game   = $this->gameRepository->create($request->game_theme_id);
        $game->addPlayer($player, true);


        return response()->json([
            'game'        => $game,
            'player'      => $player,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
