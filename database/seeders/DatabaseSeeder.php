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
        ]);
        \App\Models\Crews::create([
            'nama' => 'wahyu',
        ]);
        \App\Models\Crews::create([
            'nama' => 'bejo',
        ]);
        \App\Models\Crews::create([
            'nama' => 'waloyo',
        ]);
        \App\Models\Crews::create([
            'nama' => 'garong',
        ]);
        \App\Models\Crews::create([
            'nama' => 'joko',
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
