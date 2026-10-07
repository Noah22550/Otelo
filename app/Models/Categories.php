<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    protected $fillable = [
        'libelle',
    ];

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambre::class);
    }
}

