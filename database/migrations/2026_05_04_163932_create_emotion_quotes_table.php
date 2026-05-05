<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   
        // 中間テーブルの作成
        Schema::create('emotion_quotes', function (Blueprint $table) {
            $table->id();
            // 名言テーブルへの外部キー
            $table->foreignId('quote_id')->constrained()->cascadeOnDelete();
            // 感情テーブルへの外部キー
            $table->foreignId('emotion_id')->constrained()->cascadeOnDelete();
            // 同じ名言に同じ感情を重複して登録させないための制約
            $table->unique(['quote_id', 'emotion_id']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emotion_quotes');
    }
};
