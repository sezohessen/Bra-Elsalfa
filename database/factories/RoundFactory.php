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
        $game = Game::with('gameTheme.themeObjects', 'players')->inRandomOrder()->first();
        
        $lastRound = $game->rounds()->orderByDesc('round_number')->first();
        $roundNumber = $lastRound ? $lastRound->round_number + 1 : 1;
    
        // Get a random game answer ID for the current round
        $gameAnswerId = $game->chooseRandomAnswer()->id;

        // Get a random outcast id from the player ids array

        $outcastId = $game->players->random()->id;

        return [
            'game_id'           => $game->id,
            'round_number'      => $roundNumber,
            'game_answer_id'    => $gameAnswerId,
            'outcast_id'        => $outcastId,  
        ];
    }
}
