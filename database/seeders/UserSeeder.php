<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat user admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'), 
        ]);
        $admin->assignRole('admin');

        $pengurus = User::create([
            'name' => 'pengurus',
            'email' => 'pengurus@example.com',
            'password' => Hash::make('pengurus'), 
        ]);
        $pengurus->assignRole('pengurus');

        $santri = User::create([
            'name' => 'santri',
            'email' => 'santri@example.com',
            'password' => Hash::make('santri'), 
        ]);
        $santri->assignRole('santri');

        $parent = User::create([
            'name' => 'parent',
            'email' => 'parent@example.com',
            'password' => Hash::make('parent'), 
        ]);
        $parent->assignRole('parent');
    }
}