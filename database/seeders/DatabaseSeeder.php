<?php

namespace Database\Seeders;

// use App\Models\User;
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
        // 1. Bagian ini dikasih comment (//) biar si "Test User" nggak dieksekusi lagi
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // 2. Kita suruh Laravel buat jalanin file UserSeeder buatan lu
        $this->call([
            UserSeeder::class,
        ]);
    }
}