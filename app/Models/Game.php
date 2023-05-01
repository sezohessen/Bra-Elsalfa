<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    protected $keyType = 'string'; 
    public $incrementing = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_theme',
        'game_answer',
        'current_round',
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'game_players')
                    ->withPivot('role', 'is_creator');
    }
    
    
}
