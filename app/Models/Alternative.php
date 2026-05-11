<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'nom',
        'description',
        'impact_reduit',
        'prix',
        'marque',
        'disponible',
        'image'
    ];

    /**
     * Une alternative appartient à un produit
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}