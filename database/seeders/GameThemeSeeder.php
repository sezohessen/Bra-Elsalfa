<?php

namespace Database\Seeders;

use App\Models\GameTheme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GameThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $themes = ["animal", "movies", "countries"];

        foreach ($themes as $theme) {
            GameTheme::create([
                "name" => $theme
            ]);
        }
    }
}
