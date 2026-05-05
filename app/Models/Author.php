<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_user_original',
    ];

    protected $casts = [
        'is_user_original' => 'boolean',
    ];

    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }
}
