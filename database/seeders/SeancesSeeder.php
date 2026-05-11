<?php

namespace Database\Seeders;

use App\Models\Seances;
use Illuminate\Database\Seeder;

class SeancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Seances::factory()->count(10)->create();
    
    //
    }
}
