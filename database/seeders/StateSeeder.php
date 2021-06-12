<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'country_id' => 1,
            'name' => 'Sylhet',
            'slug' => 'sylhet',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('states')->insert([
            'country_id' => 1,
            'name' => 'Alberta',
            'slug' => 'alberta',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
