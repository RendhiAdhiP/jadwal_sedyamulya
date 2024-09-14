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
            'nama' => 'andre',
            'kategori'=>'Driver'
        ]);
        \App\Models\Crews::create([
            'nama' => 'wahyu',
            'kategori'=>'Driver'

        ]);
        \App\Models\Crews::create([
            'nama' => 'bejo',
            'kategori'=>'Co Driver'

        ]);
        \App\Models\Crews::create([
            'nama' => 'waloyo',
            'kategori'=>'Driver'

        ]);
        \App\Models\Crews::create([
            'nama' => 'garong',
            'kategori'=>'Co Driver'

        ]);
        \App\Models\Crews::create([
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
