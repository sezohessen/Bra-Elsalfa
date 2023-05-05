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
    ];


    public function chooseRandomAnswer()
    {
        $themeObjects = $this->gameThemeAnswers;
        return $themeObjects->random();
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'game_players')
            ->withPivot('is_creator');
    }
    public function creator()
    {
        return $this->players()->where('is_creator',1)->first();
    }

    public function gameTheme()
    {
        return $this->belongsTo(GameTheme::class, 'game_theme_id');
    }

    public function gameThemeAnswers()
    {
        return $this->hasManyThrough(
            ThemeObject::class,
            GameTheme::class,
            'id', // Foreign key on GameTheme table...
            'game_theme_id', // Foreign key on ThemeObject table...
            'game_theme_id', // Local key on Game table...
            'id' // Local key on GameTheme table...
        );
    }

    public function rounds()
    {
        return $this->hasMany(Round::class, 'game_id');
    }
}
