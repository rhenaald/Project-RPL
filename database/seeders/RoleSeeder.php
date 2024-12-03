<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    
    public function run(): void
    {
        // Membuat roles
        $adminRole = Role::create(['name' => 'admin']);
        $pengurusRole = Role::create(['name' => 'pengurus']);
        $santriRole = Role::create(['name' => 'santri']);
        $parentRole = Role::create(['name' => 'parent']);

        // Membuat permissions
        $manageUser = Permission::create(['name' => 'manage user']);
        $manageTransactions = Permission::create(['name' => 'manage transactions']);
        $viewTransactions = Permission::create(['name' => 'view  transactions']);

        // Assign permissions ke roles
        $adminRole->givePermissionTo($manageUser, $viewTransactions);
        $pengurusRole->givePermissionTo($manageTransactions, $viewTransactions);
        $santriRole->givePermissionTo($viewTransactions);
        $parentRole->givePermissionTo($viewTransactions);
    }
}
