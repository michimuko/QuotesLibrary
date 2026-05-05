<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DebateVote extends Model
{
    protected $fillable = [
        'user_id',
        'debate_id',
        'voted_quote_id',
    ];

    // 投票したユーザー
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 投票対象の議論
    public function debate(): BelongsTo
    {
        return $this->belongsTo(Debate::class);
    }

    // 投票された名言
    public function votedQuote(): BelongsTo
    {
        return $this->belongsTo(Quote::class, 'voted_quote_id');
    }
}
