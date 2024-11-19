<?php

namespace Database\Seeders;

use App\Models\Riego;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Riego::factory()->count(10)->create();
    }
}
