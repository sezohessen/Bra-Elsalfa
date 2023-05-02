<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameVote extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_id',
        'game_round_id',
        'voter_id',
        'voted_id',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function voter()
    {
        return $this->belongsTo(Player::class, 'voter_id');
    }

    public function voted()
    {
        return $this->belongsTo(Player::class, 'voted_id');
    }

    public function isCorrectVote($voted_id, $outcast_id)
    {
        return $voted_id == $outcast_id;
    }

}
