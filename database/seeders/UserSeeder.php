<?php

namespace Database\Seeders;

use App\Models\Seances;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer 10 utilisateurs, chacun avec 10 séances associées
       User::factory()->count(10)->has(Seances::factory()->count(10))->create();

    
    //
    }
}
