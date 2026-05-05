<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile_image_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    // ユーザーの成長記録（1対1）
    public function status(): HasOne
    {
        return $this->hasOne(UserStatus::class);
    }

    // 投稿した名言（1対多）
    public function quotes(): HasMany
    {
        return $this->hasMany(Quote::class);
    }

    // リアクションした名言（多対多）
    public function reactions(): BelongsToMany
    {
        return $this->belongsToMany(Quote::class, 'reactions')
                    ->withTimestamps();
    }

    // 議論への投票（1対多）
    public function debateVotes(): HasMany
    {
        return $this->hasMany(DebateVote::class);
    }

    // 議論へのコメント（1対多）
    public function debateComments(): HasMany
    {
        return $this->hasMany(DebateComment::class);
    }
}
