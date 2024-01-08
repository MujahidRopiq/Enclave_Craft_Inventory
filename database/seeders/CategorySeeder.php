<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Category::factory()->create([
        //     'name' => 'Chair',
        // ]);
        // Category::factory()->create([
        //     'name' => 'Table',
        // ]);
        // Category::factory()->create([
        //     'name' => 'Decoration',
        // ]);
        // Category::factory()->create([
        //     'name' => 'Shelf',
        // ]);

        $names = [
            'Chair',
            'Table',
            'Shelf',
            'Decoration',
        ];

        foreach ($names as $i => $value) {
            Category::factory()->create([
                'name' => $value,
                'sku' => $i
            ]);
        }
    }
}
