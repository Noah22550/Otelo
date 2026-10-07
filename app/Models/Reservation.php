<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $cast = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'baignoire' => 'boolean',
    ];
    function chambre()
    {
        return $this->belongsTo(Chambre::class);
    }
}
