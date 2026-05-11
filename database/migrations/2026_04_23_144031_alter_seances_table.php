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
      Schema::table('seances', function (Blueprint $table) {
        $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
        //Pour ajouter une clé étrangère à la table "seances" qui référence la table "users". 
    
    } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seances', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    
    //Pour supprimer la clé étrangère "user_id" de la table "seances" lors du rollback de la migration.
    }
};
