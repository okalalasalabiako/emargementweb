<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['nom'];

        // Ajout de la relation avec les séances de la classe
        public function seances()

        {
            return $this->hasMany(Seances::class, 'classe_id');
        }

        // Ajout de la relation avec les utilisateurs (apprenants) de la classe
        public function apprenants()

        {
            return $this->hasMany(User::class, 'classe_id');
        }
//
}
