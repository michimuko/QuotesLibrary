<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PresetBackground;

class PresetBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $backgrounds = [
            [
                'image_path' => 'backgrounds/classic_white.jpg',
                'theme_color' => '#FFFFFF',
            ],
            [
                'image_path' => 'backgrounds/night_city.jpg',
                'theme_color' => '#1A1A2E',
            ],
            [
                'image_path' => 'backgrounds/sunset_beach.jpg',
                'theme_color' => '#FF8C42',
            ],
            [
                'image_path' => 'backgrounds/forest_mist.jpg',
                'theme_color' => '#2D5A27',
            ],
            [
                'image_path' => 'backgrounds/cyber_grid.jpg',
                'theme_color' => '#0F0F0F',
            ],
        ];

        foreach ($backgrounds as $bg) {
            PresetBackground::create($bg);
        }
    }
}
