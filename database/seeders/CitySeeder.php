<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Bangladesh => Sylhet => Cities
        DB::table('cities')->insert([
            'state_id' => 1,
            'name' => 'Sylhet',
            'slug' => 'sylhet',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cities')->insert([
            'state_id' => 1,
            'name' => 'Moulvibazar',
            'slug' => 'moulvibazar',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        // Canada => Alberta => Cities
        DB::table('cities')->insert([
            'state_id' => 2,
            'name' => 'Viking',
            'slug' => 'viking',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('cities')->insert([
            'state_id' => 2,
            'name' => 'Vulcan',
            'slug' => 'vulcan',
            'status' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
