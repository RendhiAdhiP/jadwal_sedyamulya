<?php

namespace Database\Seeders;

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
        \App\Models\Crews::create([
            'id_crew' => '001',
            'password' => Hash::make('andre001'),
            'nama' => 'andre',
            'kategori'=>'Driver'
        ]);
        \App\Models\Crews::create([
            'id_crew' => '002',
            'password' => Hash::make('wahyu002'),
            'nama' => 'wahyu',
            'kategori'=>'Driver'

        ]);
        \App\Models\Crews::create([
            'id_crew' => '003',
            'password' => Hash::make('bejo003'),
            'nama' => 'bejo',
            'kategori'=>'Co Driver'

        ]);
        \App\Models\Crews::create([
            'id_crew' => '004',
            'password' => Hash::make('waloyo004'),
            'nama' => 'waloyo',
            'kategori'=>'Driver'

        ]);
        \App\Models\Crews::create([
            'id_crew' => '005',
            'password' => Hash::make('garong005'),
            'nama' => 'garong',
            'kategori'=>'Co Driver'

        ]);
        \App\Models\Crews::create([
            'id_crew' => '006',
            'password' => Hash::make('joko006'),
            'nama' => 'joko',
            'kategori'=>'Co Driver'

        ]);


        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@gmail.com'),
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
