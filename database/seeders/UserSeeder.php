<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'User', 'email' => 'user@user.com', 'password' => bcrypt('user'), 'email_verified_at' => now()
        ]);
    }
}
