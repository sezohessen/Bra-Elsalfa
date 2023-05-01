<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Creator;
use App\Models\games;
use App\Models\Player;

class GamesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Games::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'creator_id' => Player::factory(),
            'num_rounds' => $this->faker->numberBetween(-10000, 10000),
            'game_theme' => $this->faker->word,
            'num_players' => $this->faker->numberBetween(-10000, 10000),
            'current_round' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
