<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roladmin = Role::create(['name' => 'Admin']);
        $rolcajero = Role::create(['name' => 'Mesero']);
        Permission::create(['name' => 'admin.home'])->syncRoles([$roladmin, $rolcajero]);
        Permission::create(['name' => 'admin.index'])->syncRoles([$roladmin, $rolcajero]);
        Permission::create(['name' => 'admin.comandas'])->syncRoles([$roladmin, $rolcajero]);
        Permission::create(['name' => 'admin.productos'])->syncRoles([$roladmin, $rolcajero]);
        Permission::create(['name' => 'admin.users'])->assignRole($roladmin);
        // Permission::create(['name' => 'admin.crearnuevoproducto'])->assignRole($roladmin);
        // Permission::create(['name' => 'admin.users'])->assignRole($roladmin);

    }
}
