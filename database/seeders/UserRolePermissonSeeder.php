<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = User::create([
            'name' => 'administrator',
            'role_id' => 1,
            'email' => 'administrator@co.id',
            'password' => '$2y$10$Z/kaHGEoJ1CDr4V0J.eFMOBcItfS8U3Jqk.gI00b.wprJT1wSUugu',
        ]);
        $guru = User::create([
            'name' => 'admin',
            'role_id' => 2,
            'email' => 'guru@co.id',
            'password' => '$2y$10$Z/kaHGEoJ1CDr4V0J.eFMOBcItfS8U3Jqk.gI00b.wprJT1wSUugu',
        ]);
        $siswa = User::create([
            'name' => 'ahmad',
            'role_id' => 3,
            'email' => 'ahmad@gmail.com',
            'password' => '$2y$10$Z/kaHGEoJ1CDr4V0J.eFMOBcItfS8U3Jqk.gI00b.wprJT1wSUugu',
        ]);

        $role_administrator = Role::create(['name' => 'Administrator']);
        $role_admin = Role::create(['name' => 'Guru']);
        $role_kasir = Role::create(['name' => 'Siswa']);

        $permission = Permission::create(['name' => 'read pendaftaran']);
        $permission = Permission::create(['name' => 'read master']);
        $permission = Permission::create(['name' => 'read konfigurasi']);
        $permission = Permission::create(['name' => 'read konfigurasi/roles']);
        $permission = Permission::create(['name' => 'read konfigurasi/permission']);
        $permission = Permission::create(['name' => 'read konfigurasi/navigasi']);
        $permission = Permission::create(['name' => 'read pendaftaran/siswa']);
        $permission = Permission::create(['name' => 'read pendaftaran/informasi']);

        $role_administrator->givePermissionTo('read pendaftaran');
        $role_administrator->givePermissionTo('read master');
        $role_administrator->givePermissionTo('read konfigurasi');
        $role_administrator->givePermissionTo('read konfigurasi/roles');
        $role_administrator->givePermissionTo('read konfigurasi/permission');
        $role_administrator->givePermissionTo('read konfigurasi/navigasi');
        $role_administrator->givePermissionTo('read pendaftaran/siswa');
        $role_administrator->givePermissionTo('read pendaftaran/informasi');

        $administrator->assignRole('Administrator');
        $guru->assignRole('Guru');
        $siswa->assignRole('Siswa');
    }
}
