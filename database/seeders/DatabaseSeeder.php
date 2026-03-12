<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            SubtestSeeder::class,
        ]);

        $this->call(Question1Seeder::class);
        $this->call(Question2Seeder::class);
        $this->call(Question3Seeder::class);
        $this->call(Question4Seeder::class);
        $this->call(Question5Seeder::class);
        $this->call(Question6Seeder::class);
        $this->call(Question7Seeder::class);
        $this->call(Question8Seeder::class);
        $this->call(Question9Seeder::class);
        $this->call(IstIqNormsSeeder::class);
        $this->call(IstSwNormSeeder::class);
        
        $this->call(AdminSeeder::class);
    }
}
