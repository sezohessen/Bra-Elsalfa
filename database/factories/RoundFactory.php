<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\GamePlayer;
use App\Models\Player;
use App\Models\Round;
use App\Models\ThemeObject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoundFactory extends Factory
{
    protected $model = Round::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $game = Game::inRandomOrder()->first();
    
        // Get the current round number for the game
        $roundNumber = Round::where('game_id', $game->id)->max('round_number') + 1;
        
        // Get a random game answer ID for the current round
        $gameAnswerId = ThemeObject::inRandomOrder()
            ->where('game_theme_id', $game->game_theme_id)
            ->first()
            ->id;
        
        // Get a random outcast ID for the current round
        $outcastId = GamePlayer::inRandomOrder()
            ->where('game_id', $game->id)
            ->where('role', 'outcast')
            ->first()
            ->id;
    
        return [
            'game_id'           => $game->id,
            'round_number'      => $roundNumber,
            'game_answer_id'    => $gameAnswerId,
            'outcast_id'        => $outcastId,
        ];
    }
}
