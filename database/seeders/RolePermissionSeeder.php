<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'kelola-user']);
        Permission::create(['name' => 'kelola-foto']);
        Permission::create(['name' => 'kelola-vidio']);
        Permission::create(['name' => 'kelola-file']);

        Permission::create(['name' => 'tambah-file']);
        Permission::create(['name' => 'tambah-foto']);
        Permission::create(['name' => 'tambah-vidio']);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'pengguna']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('kelola-user');
        $roleAdmin->givePermissionTo('kelola-foto');
        $roleAdmin->givePermissionTo('kelola-vidio');
        $roleAdmin->givePermissionTo('kelola-file');



        $rolePengguna = Role::findByName('pengguna');
        $rolePengguna->givePermissionTo('tambah-file');
        $rolePengguna->givePermissionTo('tambah-foto');
        $rolePengguna->givePermissionTo('tambah-vidio');
    }
}
