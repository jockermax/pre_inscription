<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomFiliere',
        'cout',
        'mensualite',
        'nomFiliere',
        'duree',
        'departement_id',
    ];

    public function departement(): BelongsTo
    {
        return $this->belongsTo(Departement::class);
    }
}
