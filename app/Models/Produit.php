<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'code_barre',
        'categorie',
        'marque',
        'impact_score',
        'description',
        'image'
    ];

    /**
     * Un produit peut avoir plusieurs alternatives
     */
    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }

    /**
     * Un produit a un seul impact écologique
     */
    public function impact()
    {
        return $this->hasOne(Impact::class);
    }
}