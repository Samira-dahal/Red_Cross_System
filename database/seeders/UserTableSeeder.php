<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $role = DB::table('roles')->where('name', 'SuperAdmin')->first();

        $user = [
            'id' => 1,
            'name' => 'Samira',
            'email' => 'admin@gmail.com',
            'role_id' => $role->id,
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('users')->updateOrInsert(
            ['email' => $user['email']],
            $user
        );
    }
}
