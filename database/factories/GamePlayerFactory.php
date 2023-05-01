<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Player;
use App\Models\GamePlayer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class GamePlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GamePlayer::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $game = Game::factory()->create();
        $player = Player::factory()->create();

        return [
            'id' => Str::uuid(),
            'game_id' => $game->id,
            'player_id' => $player->id,
            'role' => $this->faker->word,
            'is_creator' => $this->faker->boolean,
        ];
    }
    
}
