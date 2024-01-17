<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seconde extends Model
{
    use HasFactory;
    protected $fillable = [
        'paysEtudeSeconde',
        'villeEtude',
        'date_debut',
        'date_fin',
        'etablissement',
        'programme',
        'BultinSeconde',
        'demande_id',
    ];

    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }
}
