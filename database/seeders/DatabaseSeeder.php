<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;

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

        $this->call([
            RoleSeeder::class,
        ]);

        // Ensure role exists
        $adminRole = Role::where('name', 'admin')->first();
        $helpdeskRole = Role::where('name', 'helpdesk')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
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

        // Assign admin role
        $admin->roles()->attach($adminRole);

        $helpdesk = User::create([
            'name' => 'Helpdesk',
            'username' => 'helpdesk',
            'password' => bcrypt('123456'),
            'email' => 'helpdesk@pupuk-indonesia.com',
            'updated_by' => 'Seeder',
            'created_by' => 'Seeder',
        ]);

        // Assign helpdesk role
        $helpdesk->roles()->attach($helpdeskRole);

        $manager = User::create([
            'name' => 'Manager',
            'username' => 'manager',
            'password' => bcrypt('123456'),
            'email' => 'manager@pupuk-indonesia.com',
            'updated_by' => 'Seeder',
            'created_by' => 'Seeder',
        ]);

        // Assign manager role
        $manager->roles()->attach($managerRole);

        $user = User::create([
            'name' => 'User',
            'username' => 'user',
            'password' => bcrypt('123456'),
            'email' => 'user@pupuk-indonesia.com',
            'updated_by' => 'Seeder',
            'created_by' => 'Seeder',
        ]);

        // Assign user role
        $user->roles()->attach($userRole);
    }
}
