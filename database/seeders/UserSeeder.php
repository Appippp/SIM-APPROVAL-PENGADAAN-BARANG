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
        $admin = User::create([
            'name' => 'Arinda Hani',
            'email' => 'admin',
            'password' => Hash::make('12345'),
            'remember_token' => null,
            'jabatan' => 'Koordinator',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now()
    ]);
    $admin->assignRole('Admin');

    $manager_operational = User::create([
        'name' => 'Rini Yulianti, Ssi,Apt',
        'email' => 'moperational',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Manager Operational',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $manager_operational->assignRole('Manager Operational');

    $kepala_bidang = User::create([
        'name' => 'Debie Herani Monica, SE',
        'email' => 'kbidang',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Kepala Bidang',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $kepala_bidang->assignRole('Kepala Bidang');

    $direk = User::create([
        'name' => 'dr. Hary Andriyanto',
        'email' => 'direktur',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Direktur',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $direk->assignRole('Direktur');

    $sdm = User::create([
        'name' => 'Sumarti,SE.Ak',
        'email' => 'mkeuangan',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Manager Keuangan',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $sdm->assignRole('Manager Keuangan');


    $manager_klinik = User::create([
        'name' => 'dr. Ahmad Syubki Asy ari',
        'email' => 'mklinik',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Manager Klinik',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $manager_klinik->assignRole('Manager Klinik');

    $unit = User::create([
        'name' => 'dr. A.A Eko Basuki',
        'email' => 'nlmku',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Kepala Klinik Utama Nusalima',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $unit->assignRole('Unit');

    $unit1 = User::create([
        'name' => 'dr. Hafizur Rahman',
        'email' => 'nlmkpn',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Kepala Klinik Pratama Nusalima Pekanbaru',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $unit1->assignRole('Unit');

    $unit2 = User::create([
        'name' => 'dr. M.Iqbal Nusa',
        'email' => 'nlmlda',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Kepala Klinik Pratama Emplasment Lubuk Dalam',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $unit2->assignRole('Unit');

    $unit3 = User::create([
        'name' => 'dr. Vita Aulia',
        'email' => 'nlmsgh',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Kepala Klinik Pratama Emplasment Sei Galuh',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $unit3->assignRole('Unit');

    $unit4 = User::create([
        'name' => 'dr. Dwi Kesuma Ferridawati',
        'email' => 'nlmsli',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Kepala Klinik Pratama Emplasment Seilinda',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $unit4->assignRole('Unit');

    $unit5 = User::create([
        'name' => 'dr. M. Reski Hakim',
        'email' => 'nlmtrt',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Kepala Klinik Pratama Emplasment Terantam',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $unit5->assignRole('Unit');
    
    $unit6 = User::create([
        'name' => 'dr. Rizki Mulia Abidin',
        'email' => 'nlmksk',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Kepala Klinik Pratama Nusaliima Kasikan',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $unit6->assignRole('Unit');

    $unit7 = User::create([
        'name' => 'dr. Putri Arianti',
        'email' => 'nlmsro',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Kepala Klinik Sri Rokan',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $unit7->assignRole('Unit');

    $unit9 = User::create([
        'name' => 'Rumah sakit Tandun',
        'email' => 'nlmrsd',
        'password' => Hash::make('12345'),
        'remember_token' => null,
        'jabatan' => 'Rumah sakit tandun',
        'foto' => null,
        'created_at' => now(),
        'updated_at' => now()
    ]);
    $unit9->assignRole('Unit');
    }
}
