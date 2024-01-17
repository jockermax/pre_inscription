<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonneesPersonnelles extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'date_naissance',
        'telephone',
        'pays_naissance',
        'ville_naissance',
        'pays_residence',
        'etat_matrimonial',
        'langue_maternelle',
        'langue_parlee',
        'status_legal',
        'demande_id',
        'email',
    ];

    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }
}
