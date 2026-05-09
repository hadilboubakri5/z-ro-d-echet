<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defi extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'points',
        'date_debut',
        'date_limite',
        'niveau',
        'actif'
    ];

    /**
     * Un défi peut avoir plusieurs participations
     */
    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
}