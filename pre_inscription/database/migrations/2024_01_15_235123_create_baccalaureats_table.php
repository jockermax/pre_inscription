<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('baccalaureats', function (Blueprint $table) {
            $table->string('paysEtudeBaccalaureat');
            $table->string('villeEtude');
            $table->string('etablissement');
            $table->string('programme');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('relever'); // Chemin pour relever bac
            $table->string('diplome'); // Chemin pour le diplome
            $table->foreignId('demande_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baccalaureats');
    }
};
