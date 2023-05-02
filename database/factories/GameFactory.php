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

        $gameThemeId = $this->faker->randomElement(GameTheme::pluck('id')->toArray());
        return [
            'id' => Str::uuid(),
            'game_theme_id' => $gameThemeId,
        ];
    }
}
