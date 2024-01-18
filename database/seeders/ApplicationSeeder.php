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
        $names = [
            'Outdoor',
            'Indoor',
            'Living room',
            'Dining room',
            'Bedroom',
        ];

        foreach ($names as $value) {
            Application::factory()->create([
                'name' => $value,
            ]);
        }
    }
}
