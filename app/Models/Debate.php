<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Debate extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'quote_id_1',
        'quote_id_2',
        'best_comment_id',
        'status',
        'description',
        'expires_at',
    ];


    // 対決する名言1
    public function quote1(): BelongsTo
    {
        return $this->belongsTo(Quote::class, 'quote_id_1');
    }

    // 対決する名言2
    public function quote2(): BelongsTo
    {
        return $this->belongsTo(Quote::class, 'quote_id_2');
    }

    // 選出されたベストコメント
    public function bestComment(): BelongsTo
    {
        return $this->belongsTo(DebateComment::class, 'best_comment_id');
    }

    // この議論に対するすべての投票
    public function votes(): HasMany
    {
        return $this->hasMany(DebateVote::class);
    }

    // この議論に対するすべてのコメント
    public function comments(): HasMany
    {
        return $this->hasMany(DebateComment::class);
    }

    // Vue3側で「議論が終了しているか」を簡単に判定する
    public function isClosed(): bool
    {
        return $this->status === 'closed';
    }
}
