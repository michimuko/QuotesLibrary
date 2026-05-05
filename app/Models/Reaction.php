<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reaction extends Model
{
    protected $fillable = [
        'user_id',
        'quote_id',
        'type',
    ];

    // 反応したユーザー
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 反応対象の名言
    public function quote(): BelongsTo
    {
        return $this->belongsTo(Quote::class);
    }
}
