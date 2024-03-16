<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Shamim',
                'mobile' => '01884892853',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'type' => 'Admin',
                'status' => 'Active',
                'created_at' => now(),
            ],
            [
                'name' => 'User',
                'mobile' => '01712000001',
                'email' => 'user@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'type' => 'Admin',
                'status' => 'Active',
                'created_at' => now(),
            ]
        ]);
    }
}
