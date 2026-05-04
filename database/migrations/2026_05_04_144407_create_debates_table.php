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
        Schema::create('debates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('quote_id_1')
                  ->constrained('quotes')
                  ->cascadeOnDelete();
            $table->foreignId('quote_id_2')
                  ->constrained('quotes')
                  ->cascadeOnDelete();
            // best_comment_id は debate_comments 作成後に追加するため nullable で先行定義
            $table->unsignedBigInteger('best_comment_id')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debates');
    }
};
