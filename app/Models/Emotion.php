<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Emotion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'color_code',
    ];

    // 感情タグが付いた名言 (多対多)
    public function quotes(): BelongsToMany
    {
        return $this->belongsToMany(Quote::class, 'emotion_quotes')
                    ->withTimestamps();
    }
}
