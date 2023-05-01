<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Game;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    { 
        return [
            'id' => Str::uuid(),
            'game_theme' => $this->faker->word,
            'game_answer' => $this->faker->word,
            'current_round' => $this->faker->numberBetween(1, 10),
        ];
    }
}
