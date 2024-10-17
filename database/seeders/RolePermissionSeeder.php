<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions
        $permissions = [
            'management-access',
            'master-data',
            'table-user',
            'ubah-user',
            'tambah-user',
            'hapus-user',
            'table-role',
            'ubah-role',
            'tambah-role',
            'tambah-permission-role',
            'hapus-role',
            'table-permission',
            'ubah-permission',
            'tambah-permission',
            'hapus-permission',
            'table-unit',
            'tambah-unit',
            'ubah-unit',
            'hapus-unit',
            'table-kategori',
            'tambah-kategori',
            'ubah-kategori',
            'hapus-kategori',
            'table-permintaan',
            'tambah-permintaan',
            'ubah-permintaan',
            'hapus-permintaan',
            'unit-permintaan',
            'manager-klinik',
            'cetak-surat',
            'admin-updated',
            'kepala-bidang',
            'manager-operational',
            'manager-keuangan',
            'direktur',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign permissions to roles
        $roles = [
            'Admin',
            'Manager Operational',
            'Kepala Bidang',
            'Manager Keuangan',
            'Direktur',
            'Unit',
            'Manager Klinik',

        ];


        foreach ($roles as $roleName) {
            $role = Role::create(['name' => $roleName]);

            if ($roleName == 'Admin') {
                $role->givePermissionTo([
                    'management-access',
                    'master-data',
                    'table-user',
                    'ubah-user',
                    'tambah-user',
                    'hapus-user',
                    'table-role',
                    'ubah-role',
                    'tambah-role',
                    'tambah-permission-role',
                    'hapus-role',
                    'table-permission',
                    'ubah-permission',
                    'tambah-permission',
                    'hapus-permission',
                    'table-unit',
                    'tambah-unit',
                    'ubah-unit',
                    'hapus-unit',
                    'table-kategori',
                    'tambah-kategori',
                    'ubah-kategori',
                    'hapus-kategori',
                    'cetak-surat',
                    'admin-updated',

                ]);
            } elseif ($roleName == 'Unit') {
                $role->givePermissionTo([
                    'table-permintaan',
                    'tambah-permintaan',
                    'hapus-permintaan',
                    'unit-permintaan',
                ]);
            } elseif ($roleName == 'Manager Klinik') {
                $role->givePermissionTo([
                    'manager-klinik',
                ]);
            } elseif ($roleName == 'Kepala Bidang') {
                $role->givePermissionTo([
                    'kepala-bidang',
                ]);
            } elseif ($roleName == 'Manager Operational') {
                $role->givePermissionTo([
                    'manager-operational',
                ]);
            } elseif ($roleName == 'Manager Keuangan') {
                $role->givePermissionTo([
                    'manager-keuangan',
                ]);
            } elseif ($roleName == 'Direktur') {
                $role->givePermissionTo([
                    'direktur',
                ]);
            }
        }
    }
}
