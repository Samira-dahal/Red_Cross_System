<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->updateOrInsert(
            ['id' => 1],
            [
                'name' => 'Nepal',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
