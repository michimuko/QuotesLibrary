<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserStatus extends Model
{
    protected $table = 'user_status';

    protected $fillable = [
        'user_id',
        'points',
        'rank_label',
        'next_rank_points',
    ];

    // ユーザーへの逆リレーション
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Vue3（Inertia）側で「あと何ポイントで次か」などを計算するために
    // 常に型を保証して返す。
    protected function casts(): array
    {
        return [
            'points' => 'integer',
            'next_rank_points' => 'integer',
        ];
    }
}

