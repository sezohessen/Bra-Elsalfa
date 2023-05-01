<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Animal;
use App\Models\Country;
use App\Models\Game;
use App\Models\GamePlayer;
use App\Models\GameTheme;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Animal::factory()->count(10)->create();   
        Country::factory()->count(10)->create();   
        GameTheme::factory()->count(10)->create();   
        GamePlayer::factory()->count(10)->create();   
    }
}
