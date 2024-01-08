<?php

namespace Database\Seeders;

use App\Models\Application;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Application::factory()->create([
            'name' => 'Outdoor',
        ]);
        Application::factory()->create([
            'name' => 'Indoor',
        ]);
        Application::factory()->create([
            'name' => 'Living room',
        ]);
        Application::factory()->create([
            'name' => 'Dining room',
        ]);
        Application::factory()->create([
            'name' => 'Bedroom',
        ]);
        Application::factory()->create([
            'name' => 'Decor',
        ]);
        Application::factory()->create([
            'name' => 'Home furniture',
        ]);
    }
}
