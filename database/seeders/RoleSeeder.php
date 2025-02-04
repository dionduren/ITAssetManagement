<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->truncate(); // Clear existing roles

        $roles = [
            ['name' => 'admin', 'description' => 'Administrator - Full Access'],
            ['name' => 'helpdesk', 'description' => 'Helpdesk - Can edit content'],
            ['name' => 'manager', 'description' => 'Manager - User Supervisor'],
            ['name' => 'user', 'description' => 'User - Basic access'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
