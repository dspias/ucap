<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => Role::whereSlug('superadmin')->firstOrFail()->id,
            'name' => 'Demo Super Admin',
            'email' => 'superadmin@mail.com',
            'avatar' => 'avatar.png',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'role_id' => Role::whereSlug('centre')->firstOrFail()->id,
            'name' => 'Demo UCAP Centre',
            'email' => 'centre@mail.com',
            'avatar' => 'avatar.png',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'role_id' => Role::whereSlug('university')->firstOrFail()->id,
            'name' => 'Demo University',
            'email' => 'university@mail.com',
            'avatar' => 'avatar.png',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'role_id' => Role::whereSlug('representative')->firstOrFail()->id,
            'name' => 'Demo Representative',
            'email' => 'representative@mail.com',
            'avatar' => 'avatar.png',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'role_id' => Role::whereSlug('student')->firstOrFail()->id,
            'name' => 'Demo Student',
            'email' => 'student@mail.com',
            'avatar' => 'avatar.png',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
