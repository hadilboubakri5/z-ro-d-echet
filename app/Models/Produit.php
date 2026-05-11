<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produit extends Model
{
    protected $fillable = [
        'code_barre',
        'nom',
        'marque',
        'categorie',
        'description',
        'impact_score',
        'emballage',
        'recyclable',
        'score_zero_dechet',
    ];

    protected function casts(): array
    {
        return [
            'recyclable' => 'boolean',
        ];
    }

    public function impact(): HasOne
    {
        return $this->hasOne(Impact::class);
    }

    public function alternatives(): HasMany
    {
        return $this->hasMany(Alternative::class);
    }
}
