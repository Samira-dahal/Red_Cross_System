<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'SuperAdmin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ProvinceUser', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'DistrictUser', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'BranchUser', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['name' => $role['name']],
                $role
            );
        }
    }
}
