<?php

namespace Database\Seeders;

use App\Models\Kategoria;
use Illuminate\Database\Seeder;

class KategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategoria::factory()->count(10)->create();
    }
}