<?php

namespace Database\Factories;

use App\Models\Seances;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Seances>
 */
class SeancesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //En Français
    $local = 'fr_FR';
   
    //Paramètres de la séance
    $startDate = fake($local)->dateTimeBetween('-1 year', '+1 year');

    $end = (clone $startDate)->modify('+' . fake($local)->numberBetween(120, 240) . ' minutes');

    $valide = fake($local)->boolean(); 

// Si la séance est validée, générer une date de validation aléatoire entre la date de début et la date de fin
    if ($valide) {
        $date_validation = (clone $startDate)->modify('+' . fake($local)->numberBetween(10, 60) . ' minutes');
    } else {
        $date_validation = null;
    }

    // Niveau 2 (pour la condition de validation)
    //$date_validation = $valide ? (clone $startDate)->modify('+' . fake($local)->numberBetween(10, 60) . ' minutes') : null;

        return [
            'matiere' => 'Seances de ' . fake($local)->word(),
            'date' => $startDate->format('Y-m-d'),
            'heure_debut' => $startDate->format('H:i:s'),
            'heure_fin' => $end->format('H:i:s'),
        
            'valide' => $valide,
        ];
   
    }
}
