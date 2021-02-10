<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
              'name' => 'admin',
              'email' => 'mahmudulhossain786@gmail.com',
              'password' => bcrypt('password'),
              'role' => 'Admin',
              'created_at' => now(),
            ),
            array(
              'name' => 'user',
              'email' => 'mahmudul@tlntrip.com',
              'password' => bcrypt('password'),
              'role' => 'Employee',
              'created_at' => now(),
            ),
          ));
    }
}
