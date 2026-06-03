<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::create([
            'name' => 'BTS SIO 1'
        ]);

        Classes::create([
            'name' => 'BTS SIO 2'
        ]);

        Classes::create([
            'name' => 'Bachelor 1'
        ]);

        Classes::create([
            'name' => 'Bachelor 2'
        ]);

        Classes::create([
            'name' => 'Master 1'
        ]);
    }
}