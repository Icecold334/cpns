<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Fauzan Imam',
            'email' => 'fauzanimam334@gmail.com',
            'role' => 1,
            'gender' => 0,
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
        User::factory()->create([
            'name' => 'Ini Guru',
            'email' => 'guru@gmail.com',
            'role' => 2,
            'gender' => 0,
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
        User::factory()->create([
            'name' => 'Ini Siswa',
            'email' => 'siswa@gmail.com',
            'role' => 3,
            'gender' => 0,
            'password' => Hash::make('password123'),
            'email_verified_at' => now(),
        ]);
    }
}
