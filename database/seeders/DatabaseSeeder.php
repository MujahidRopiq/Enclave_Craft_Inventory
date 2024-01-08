<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buyer;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Supplier::factory(10)->create();

        $this->call([
            ApplicationSeeder::class,
            CategorySeeder::class,
            Material1Seeder::class,
            Material2Seeder::class,
            Material3Seeder::class,
            Material4Seeder::class,
            FinishingSeeder::class,
            FurnitureSeeder::class,
            FurnitureImageSeeder::class,
        ]);
    }
}
