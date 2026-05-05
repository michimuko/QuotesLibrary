<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quote;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. 「好きを仕事に」側の名言 (ID: 1 になる想定)
        Quote::create([
            'user_id' => 1,
            'author_id' => 1, // スティーブ・ジョブズ（AuthorSeederで最初に作る想定）
            'preset_background_id' => 1,
            'content' => 'すばらしい仕事をする唯一の方法は、自分のやっていることを好きになることだ。',
            'episode' => 'スタンフォード大学の卒業式でのスピーチの一節です。',
            'status' => 'active',
        ]);

        // 2. 「置かれた場所で咲く」側の名言 (ID: 2 になる想定)
        Quote::create([
            'user_id' => 1,
            'author_id' => 2, // ニーチェ、または別の著者
            'preset_background_id' => 2,
            'content' => '置かれた場所で咲きなさい。どうしても咲けないときは、下へ下へと根を伸ばしなさい。',
            'episode' => '環境に文句を言うのではなく、今ある場所で最善を尽くす大切さを説いています。',
            'status' => 'active',
        ]);

        // 3. その他、テスト用のランダムな名言
        Quote::create([
            'user_id' => 1,
            'author_id' => 1,
            'preset_background_id' => 3,
            'content' => 'もし今日が人生最後の日だとしたら、私は今日やる予定のことをやりたいと思うだろうか？',
            'episode' => '毎朝鏡を見て自分に問いかけていたそうです。',
            'status' => 'active',
        ]);
    }
}
