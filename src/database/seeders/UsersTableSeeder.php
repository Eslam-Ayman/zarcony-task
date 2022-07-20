<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
                'full_name' => 'admin',
                'email' => 'admin@admin.com',
                'mobile_no' => '01149802178',
                'password' => \Hash::make('12345678'),
                'is_super_admin' => 1,
            ],
            [
                'full_name' => 'client',
                'email' => 'client@client.com',
                'mobile_no' => '01149802179',
                'password' => \Hash::make('12345678'),
                'is_super_admin' => 0,
            ],
        ];

        \App\Models\User::insert($users);
    }
}
