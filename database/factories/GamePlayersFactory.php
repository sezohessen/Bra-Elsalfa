<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\Player;
use App\Models\gamePlayers;
use App\Models\Players;

class GamePlayersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GamePlayers::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'game_id' => Game::factory(),
            'player_id' => Player::factory(),
            'role' => $this->faker->word,
        ];
    }
}
