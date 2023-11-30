<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Rawr',
            'username' => 'Rawr', // Make sure the 'username' is included
            'email' => 'sugoi@email.com',
            'password' => bcrypt('123'), // Use bcrypt for password hashing
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'username' => 'admin', // Make sure the 'username' is included
            'email' => 'garden@email.com',
            'password' => bcrypt('admin'), // Use bcrypt for password hashing
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
