<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GamePlayer;
use App\Models\Player;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;


class GamePlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($gameI = 0; $gameI <= 2; $gameI++) {
            $game    = Game::factory()->create();
            $players = Player::factory()->count(4)->create();

            $gamePlayers = $players->map(function ($player, $index) use ($game) {
                return [
                    'game_id' => $game->id,
                    'player_id' => $player->id,
                    'is_creator' => ($index === 0),
                ];
            });

            GamePlayer::insert($gamePlayers->toArray());
        }
    }
}
