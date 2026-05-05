<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class PresetBackground extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image_path',
        'theme_color',
    ];


    // Vue3 (Inertia) 側で画像を表示しやすくするためのプロパティ
    // $appends に入れることで、JSON変換時に自動でフルパスが含まれるようになる。
    protected $appends = ['image_url'];

    // image_path をブラウザで表示可能な URL に変換
    public function getImageUrlAttribute(): string
    {
        return asset(Storage::url($this->image_path));
    }


    // この背景を使用している名言一覧
    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
