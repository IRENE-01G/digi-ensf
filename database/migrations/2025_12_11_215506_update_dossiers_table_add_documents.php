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
        Schema::table('dossiers', function (Blueprint $table) {
            $table->dropColumn('chemin_fichier');
            $table->string('acte_naissance')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('bac')->nullable();
            $table->string('casier')->nullable();
            $table->string('medical')->nullable();
            $table->string('note_service')->nullable();
            $table->text('lettre_motivation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dossiers', function (Blueprint $table) {
            $table->string('chemin_fichier')->nullable();
            $table->dropColumn([
                'acte_naissance',
                'nationalite',
                'bac',
                'casier',
                'medical',
                'note_service',
                'lettre_motivation'
            ]);
        });
    }
};
