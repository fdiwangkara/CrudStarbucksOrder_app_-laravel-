<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payments;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Orders::factory(25)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Payments::create([
            'name' => 'Gopay'
        ]);

        Payments::create([
            'name' => 'BCA'
        ]);

        Payments::create([
            'name' => 'Apple Pay'
        ]);

        Payments::create([
            'name' => 'Brimo'
        ]);
    }
}
