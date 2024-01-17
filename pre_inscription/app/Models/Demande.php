<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'statusPayement',
        'statusDemande',
        'users_id',
        'storagePath',
        'filiere',
        'niveau_a_integrer',
    ];

    public function DonneesPersonnelles():HasOne
    {
        return $this->hasOne(DonneesPersonnelles::class);
    }

    public function seconde():HasOne
    {
        return $this->hasOne(Seconde::class);
    }

    public function premiere():HasOne
    {
        return $this->hasOne(Premiere::class);
    }

    public function terminal():HasOne
    {
        return $this->hasOne(Terminal::class);
    }

    public function baccalaureat():HasOne
    {
        return $this->hasOne(Baccalaureat::class);
    }

}
