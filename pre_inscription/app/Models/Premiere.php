<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Premiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'paysEtudePremiere',
        'villeEtude',
        'date_debut',
        'date_fin',
        'etablissement',
        'programme',
        'BultinPremiere',
        'demande_id',
    ];

    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }
}
