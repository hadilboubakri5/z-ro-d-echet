<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImpactAction extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'category',
        'waste_kg',
        'carbon_kg',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
