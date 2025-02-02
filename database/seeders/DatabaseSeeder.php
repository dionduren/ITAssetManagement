<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Dion Alamsah',
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'email' => 'dion.alamsah@pupuk-indonesia.com',
            // 'email_verified_at' => now(),
            // 'atasan_id' => '1180042',
            // 'nama_atasan' => 'Atasan Dion',
            // 'unit_kerja' => 'Operasional TI',
            // 'role_id' => '1',
            'updated_by' => 'Seeder',
            'created_by' => 'Seeder',
        ]);
    }
}
