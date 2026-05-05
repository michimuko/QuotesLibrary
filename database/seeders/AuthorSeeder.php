<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            ['name' => 'スティーブ・ジョブズ', 'is_user_original' => false, 'description' => 'Apple創業者'],
            ['name' => 'ニーチェ', 'is_user_original' => false, 'description' => '哲学者'],
            ['name' => 'テストユーザー', 'is_user_original' => true, 'user_id' => 1, 'description' => '昔お世話になった人の言葉'],
        ];

        foreach ($authors as $author) {
            \App\Models\Author::create($author);
        }
    }
}
