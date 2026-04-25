<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Связь с ролью (один пользователь — одна роль)
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    //  Проверка: является ли пользователь модератором
    public function isModerator(): bool
    {
        return $this->role && $this->role->slug === 'moderator';
    }
    public function comments()
    {
    return $this->hasMany(Comment::class);
    }
}