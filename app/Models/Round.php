<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_id',
        'outcast_id',
        'game_answer_id',
        'round_number'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function answer()
    {
        return $this->hasOne(ThemeObject::class, 'id', 'game_answer_id');
    }

    public function votes()
    {
        return $this->hasMany(GameVote::class);
    }

}
