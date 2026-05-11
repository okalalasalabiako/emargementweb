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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classes::class, 'classe_id');
    }

    public function emargements()
    {
        return $this->hasMany(Emargements::class, 'seance_id');
    }
}
