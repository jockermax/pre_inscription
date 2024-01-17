<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $fillable =['nomDepartement'];

    public function filiere()
    {
        return $this->hasMany(Filiere::class);
    }
}
