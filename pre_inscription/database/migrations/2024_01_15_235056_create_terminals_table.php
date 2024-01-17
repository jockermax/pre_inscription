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
        Schema::create('terminals', function (Blueprint $table) {
            $table->string('paysEtudeTerminal');
            $table->string('villeEtude');
            $table->string('etablissement');
            $table->string('programme');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('BultinTerminal'); // Chemin pour le bultin
            $table->foreignId('demande_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terminals');
    }
};
