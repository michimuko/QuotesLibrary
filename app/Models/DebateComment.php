<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DebateComment extends Model
{
    protected $fillable = [
        'debate_id',
        'user_id',
        'content',
        'is_best',
    ];

    // フロントエンドで true/false として扱いやすくします。
    protected $casts = [
        'is_best' => 'boolean',
    ];

    // このコメントが投稿された議論
    public function debate(): BelongsTo
    {
        return $this->belongsTo(Debate::class);
    }

    // コメントを投稿したユーザー
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
