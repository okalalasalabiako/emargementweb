<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Seances extends Model
{
    use HasFactory;

    protected $fillable = [
        'matiere',
        'date',
        'heure_debut',
        'heure_fin',
        'valide',
        'user_id',
        'classe_id',
        'emargements',
    ];

   

    /*
    |--------------------------------------------------------------------------
    | RELATION : Un enseignant possède plusieurs séances
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION : Une séance appartient à une classe
    |--------------------------------------------------------------------------
    */
    public function classe()
    {
        return $this->belongsTo(Classes::class, 'classe_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATION : Une séance possède plusieurs émargements
    |--------------------------------------------------------------------------
    */
    public function emargements()
    {
        return $this->hasMany(Emargements::class, 'seance_id');
    }
}
