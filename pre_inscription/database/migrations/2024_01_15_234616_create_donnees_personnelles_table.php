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
        Schema::create('donnees_personnelles', function (Blueprint $table) {
            $table->string('nom');
            $table->string('prenom');
            $table->char('sexe', 1); // 'M' ou 'F'
            $table->date('date_naissance');
            $table->string('pays_naissance');
            $table->string('telephone');
            $table->string('ville_naissance');
            $table->string('pays_residence');
            $table->string('email');
            $table->string('langue_maternelle');
            $table->string('langue_parlee');
            $table->string('status_legal');
            $table->foreignId('demande_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donnees_personnelles');
    }
};
