<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'defi_id',
        'statut',
        'points_gagnes',
        'date_participation'
    ];

    /**
     * Une participation appartient à un utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Une participation appartient à un défi
     */
    public function defi()
    {
        return $this->belongsTo(Defi::class);
    }
}