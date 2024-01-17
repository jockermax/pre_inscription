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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->string('storagePath');
            $table->string('filiere');
            $table->string('niveau_a_integrer');
            $table->boolean('statusPayement')->default(false);
            $table->boolean('statusDemande')->default(false);
            $table->string('motifRejet')->nullable();
            $table->integer('etatDemande')->nullable();
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
