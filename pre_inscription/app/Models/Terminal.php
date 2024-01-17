<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Terminal extends Model
{
    use HasFactory;
    protected $fillable = [
        'paysEtudeTerminal',
        'villeEtude',
        'date_debut',
        'date_fin',
        'etablissement',
        'programme',
        'BultinTerminal',
        'demande_id',
    ];

    public function demande(): BelongsTo
    {
        return $this->belongsTo(Demande::class);
    }
}
