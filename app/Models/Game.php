<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Game extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

     /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid()->toString();
        });
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'game_theme_id',
        'game_answer_id',
        'current_round',
    ];


    public function addPlayer(Player $player, $isCreator = false)
    {
        $gamePlayerData = [
            $player->id => [
                'id'         => Str::uuid()->toString(),
                'is_creator' => $isCreator,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $this->players()->syncWithoutDetaching($gamePlayerData);
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'game_players')
            ->withPivot('role', 'is_creator');
    }

    public function gameTheme()
    {
        return $this->belongsTo(GameTheme::class,'game_theme_id');
    }

    public function gameAnswer()
    {
        return $this->belongsTo(ThemeObject::class, 'game_answer_id');
    }
}
