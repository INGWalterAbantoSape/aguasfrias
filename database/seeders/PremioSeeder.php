<?php

namespace Database\Seeders;

use App\Models\Premio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PremioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Premio::factory()->count(10)->create();
    }
}
