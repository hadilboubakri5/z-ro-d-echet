<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impact extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'empreinte_carbone',
        'recyclable',
        'composition',
        'niveau_pollution',
        'consommation_eau',
        'temps_decomposition'
    ];

    /**
     * Chaque impact appartient à un produit
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}