<?php

namespace Database\Seeders;

use App\Models\Finishing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinishingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Coloring',
            'Natural',
            'Rustic',
        ];

        foreach ($names as $value) {
            Finishing::factory()->create([
                'name' => $value,
            ]);
        }
    }
}
