<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Debate;

class DebateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Debate::create([
            'title' => '究極の仕事観対決',
            'quote_id_1' => 1,
            'quote_id_2' => 2,
            'description' => '「好きを仕事に」か「置かれた場所で咲く」か。あなたの意見は？',
            'status' => 'open',
            'expires_at' => now()->addDays(14),
        ]);
    }
}
