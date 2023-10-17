<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory(1)->create([
            'name' => 'Test User Admin',
            'email' => 'admin1@gmail.com',
            'password' => '$2y$10$Xs0/55nznm2t8fBQ0my9xuLhjUzGkLGUuAydo8Nu/p6zLVmgG6r0.',
            'role' => 'user_admin',
        ]);
    }
}
