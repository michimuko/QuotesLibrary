<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('debate_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('debate_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->text('content');
            $table->boolean('is_best')->default(false);
            $table->timestamps();
        });

        // debates.best_comment_id の外部キー制約をここで追加（循環参照解消）
        Schema::table('debates', function (Blueprint $table) {
            $table->foreign('best_comment_id')
                  ->references('id')
                  ->on('debate_comments')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('debates', function (Blueprint $table) {
            $table->dropForeign(['best_comment_id']);
        });

        Schema::dropIfExists('debate_comments');
    }
};