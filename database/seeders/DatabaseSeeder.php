<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Dosen;
use App\Models\Berita;
use App\Models\Kategori;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::factory(10)->create();

        /**Jurusan::create([
           'nama' => 'Teknologi Informasi'
        ]);

        Jurusan::create([
            'nama' => 'Akuntansi'
      ]);**/

       // Mahasiswa::factory(20)->create();

       // Dosen::factory(20)->create();

        //Berita::factory(7)->create();
        Kategori::create([
           'nama' => 'Web Developer'
        ]);

        Kategori::create([
            'nama' => 'Mobile Developer'
      ]);
        

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
