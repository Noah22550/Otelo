<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
