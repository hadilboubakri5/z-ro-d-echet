<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Champs autorisés pour l'inscription
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Champs cachés (sécurité)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast automatique des types
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 🔥 IMPORTANT : hash automatique du password
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Relation avec participations (Zéro Déchet)
     */
    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
}