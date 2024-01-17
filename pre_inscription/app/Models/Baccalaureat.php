<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Baccalaureat extends Model
{
    use HasFactory;

    protected $fillable = [
        'paysEtudeBaccalaureat',
        'villeEtude',
        'date_debut',
        'date_fin',
        'etablissement',
        'programme',
        'relever',
        'diplome',
        'demande_id',
    ];

    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }
}
