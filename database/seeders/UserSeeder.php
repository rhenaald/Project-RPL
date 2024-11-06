<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //users
         $users = [
            [
                // admin
                'name' => "admin",
                'email' => "admin@example.com",
                'password' => "admin",
                'role' => 'admin'
            ],
            [
                // pengurus
                'name' => "pengurus",
                'email' => "pengurus@example.com",
                'password' => "pengurus",
                'role' => 'pengurus'
            ],
            [
                // santri
                'name' => "santri",
                'email' => "santri@example.com",
                'password' => "santri",
                'role' => 'santri'

            ],
            [
                // parent
                'name' => "parent",
                'email' => "parent@example.com",
                'password' => "parent",
                'role' => 'parent'

            ],
        ];

        foreach ($users as $user) {
            $created_user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password'])
            ]);

            $created_user->assignRole($user['role']);
        }
    }
}