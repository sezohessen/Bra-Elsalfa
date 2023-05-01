<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GamePlayer;
use App\Models\Player;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Str;


class GamePlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($gameI = 0; $gameI <= 2; $gameI++) {
            $game  = Game::factory()->create();
            $players = [];
            for ($playerI = 0; $playerI <= 3; $playerI++) {
                $player = Player::factory()->create();
                $players[] = [
                    "id" => Str::uuid(),
                    'game_id' => $game->id,
                    'player_id' => $player->id,
                    'role' => 'normal',
                    'is_creator' => false,
                ];
            }
            $outcastIndex = $faker->numberBetween(0, 3);
            $players[$outcastIndex]['role'] = 'outcast';

            $creatorIndex = $faker->numberBetween(0, 3);
            $players[$creatorIndex]['is_creator'] = true;
            foreach ($players as $player) {
                GamePlayer::create($player);
            }
        }
    }
}
