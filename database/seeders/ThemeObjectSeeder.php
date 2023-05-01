<?php

namespace Database\Seeders;

use App\Models\GameTheme;
use App\Models\ThemeObject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ThemeObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objects = [
            "animal" => ["dog", "cow", "cat"],
            "movies" => ["The Godfather", "The Shawshank Redemption", "The Dark Knight"],
            "countries" => ["Egypt", "USA", "China"]
        ];

        foreach ($objects as $themeName => $themeObjects) {
            $theme = GameTheme::where('name', $themeName)->first();

            foreach ($themeObjects as $object) {
                ThemeObject::create([
                    "id" => Str::uuid(),
                    "name" => $object,
                    "game_theme_id" => $theme->id
                ]);
            }
        }
    }
}
