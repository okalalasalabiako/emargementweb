<?php

namespace Database\Seeders;

use App\Models\Seances;
use Illuminate\Database\Seeder;

class SeancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function definition(): array
    {
        return [
            'matiere' => fake()->word(),
            'date' => fake()->date(),
            'heure_debut' => fake()->time(),
            'heure_fin' => fake()->time(),
            'valide' => fake()->boolean(),

            'user_id' => rand(1, 10),
            'classe_id' => rand(1, 5),
        ];
    }

  public function run(): void
    {
        Seances::factory()->count(10)->create();
    }

}
