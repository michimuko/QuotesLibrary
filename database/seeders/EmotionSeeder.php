<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Emotion;

class EmotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emotions = [
            ['name' => '泣ける', 'slug' => 'moving', 'color_code' => '#3498db'],
            ['name' => '勇気が出る', 'slug' => 'inspiring', 'color_code' => '#e67e22'],
            ['name' => '救われる', 'slug' => 'relieving', 'color_code' => '#2ecc71'],
            ['name' => '刺さる', 'slug' => 'deep', 'color_code' => '#e74c3c'],
            ['name' => '笑える', 'slug' => 'funny', 'color_code' => '#f1c40f'],
        ];

        foreach ($emotions as $emotion) {
            Emotion::create($emotion);
        }
    }
}
