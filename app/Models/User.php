<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Tutor;
use App\Models\Order;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public function tutors(): HasMany
    {
        return $this->hasMany(Tutor::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    protected $fillable = [
        'first_name',
        'last_name',

        'email',
        'password',

        'is_tutor',
        'is_admin',
        'is_active',

        'email_verified_at',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'is_tutor' => 'boolean',
            'is_admin' => 'boolean',
            'is_active' => 'boolean',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
