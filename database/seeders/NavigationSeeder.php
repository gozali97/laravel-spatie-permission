<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Navigation::create([
            'name' => 'Pendaftaran',
            'url' => 'pendaftaran',
            'icon' => 'bi-person-circle'
        ]);
        Navigation::create([
            'name' => 'Master Data',
            'url' => 'master',
            'icon' => 'bi-box'
        ]);
        Navigation::create([
            'name' => 'Konfigurasi',
            'url' => 'konfigurasi',
            'icon' => 'bi-collection-fill'
        ]);
        Navigation::create([
            'name' => 'siswa',
            'url' => 'pendaftaran/siswa',
            'main_menu' => 1
        ]);
        Navigation::create([
            'name' => 'User',
            'url' => 'master/user',
            'main_menu' => 2
        ]);
        Navigation::create([
            'name' => 'Menu',
            'url' => 'konfigurasi/navigasi',
            'main_menu' => 3
        ]);
        Navigation::create([
            'name' => 'Role',
            'url' => 'konfigurasi/roles',
            'main_menu' => 3
        ]);
        Navigation::create([
            'name' => 'Permission',
            'url' => 'konfigurasi/permission',
            'main_menu' => 3
        ]);
    }
}
