<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\GameTheme;
use App\Models\ThemeObject;

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
        $themes     = GameTheme::all();
        foreach ($themes as $theme) {
            $themeObject = ThemeObject::where('game_theme_id', $theme->id)->inRandomOrder()->first();
            return [
                'id' => Str::uuid(),
                'game_theme_id' => $theme->id,
                'game_answer_id' => $themeObject->id,
                'current_round' => $this->faker->numberBetween(1, 10),
            ];
        }
    }
}
