<?php

namespace Database\Seeders;

use App\Models\Jawaban;
use App\Models\Kategori;
use App\Models\Paket;
use App\Models\Soal;
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
        User::factory()->create(['name' => 'Fauzan Imam', 'email' => 'fauzanimam334@gmail.com', 'role' => 1, 'gender' => 0, 'password' => Hash::make('password123'), 'email_verified_at' => now(),]);
        User::factory()->create(['name' => 'Ini Guru', 'email' => 'guru@gmail.com', 'role' => 2, 'gender' => 0, 'password' => Hash::make('password123'), 'email_verified_at' => now(),]);
        User::factory()->create(['name' => 'Ini Siswa', 'email' => 'siswa@gmail.com', 'role' => 3, 'gender' => 0, 'password' => Hash::make('password123'), 'email_verified_at' => now(),]);
        Kategori::factory()->create(['nama' => 'TWK', 'deskripsi' => 'Tes Wawasan Kebangsaan']);
        Kategori::factory()->create(['nama' => 'TIU', 'deskripsi' => 'Tes Intelegensia Umum']);
        Kategori::factory()->create(['nama' => 'TKP', 'deskripsi' => 'Tes Karakteristik Pribadi']);
        Paket::factory()->create(['nama' => 'Paket Soal A', 'user_id' => 1]);
        Soal::factory()->create(['paket_id' => 1, 'kategori_id' => 2, 'soal' => 'Berapa 1 + 1?']);
        Jawaban::factory()->create(['soal_id' => 1, 'row' => '1', 'jawaban' => '3', 'benar' => false]);
        Jawaban::factory()->create(['soal_id' => 1, 'row' => '2', 'jawaban' => '8', 'benar' => false]);
        Jawaban::factory()->create(['soal_id' => 1, 'row' => '3', 'jawaban' => '2', 'benar' => true]);
        Jawaban::factory()->create(['soal_id' => 1, 'row' => '4', 'jawaban' => '4', 'benar' => false]);
        Jawaban::factory()->create(['soal_id' => 1, 'row' => '5', 'jawaban' => '1', 'benar' => false]);
        Soal::factory()->create(['paket_id' => 1, 'kategori_id' => 1, 'soal' => 'Siapa Hokage ke-7?']);
        Jawaban::factory()->create(['soal_id' => 2, 'row' => '1', 'jawaban' => 'Sakura', 'benar' => false]);
        Jawaban::factory()->create(['soal_id' => 2, 'row' => '2', 'jawaban' => 'Jan Ethes', 'benar' => false]);
        Jawaban::factory()->create(['soal_id' => 2, 'row' => '3', 'jawaban' => 'Himawari', 'benar' => false]);
        Jawaban::factory()->create(['soal_id' => 2, 'row' => '4', 'jawaban' => 'Naruto', 'benar' => true]);
        Jawaban::factory()->create(['soal_id' => 2, 'row' => '5', 'jawaban' => 'Jokowi', 'benar' => false]);
    }
}
