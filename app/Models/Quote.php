<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quote extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'author_id',
        'preset_background_id',
        'content',
        'episode',
        'status',
    ];

    // 発言者
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    // 投稿したユーザー
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // 設定された背景
    public function background(): BelongsTo
    {
        return $this->belongsTo(PresetBackground::class, 'preset_background_id');
    }

    // 感情タグ（多対多）
    public function emotions(): BelongsToMany
    {
        return $this->belongsToMany(Emotion::class, 'emotion_quotes');
    }

    // 「救われた！」などの反応
    public function reactions(): HasMany
    {
        return $this->hasMany(Reaction::class);
    }
}
