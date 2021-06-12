<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name' => 'Canada',
            'slug' => 'CA',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
