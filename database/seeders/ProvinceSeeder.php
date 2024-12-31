<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            ['name' => 'Koshi Province', 'country_id' => 1],
            ['name' => 'Madhesh Province', 'country_id' => 1],
            ['name' => 'Bagmati Province', 'country_id' => 1],
            ['name' => 'Gandaki Province', 'country_id' => 1],
            ['name' => 'Lumbini Province', 'country_id' => 1],
            ['name' => 'Karnali Province', 'country_id' => 1],
            ['name' => 'Sudurpashchim Province', 'country_id' => 1],
        ];

        foreach ($provinces as $province) {
            DB::table('provinces')->insert([
                'name' => $province['name'],
                'country_id' => $province['country_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
