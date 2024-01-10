<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Yudha P',
            'jabatan'   => 'pegawai',
            'email'     => 'pegawai@gmail.com',
            'role'      => 'pegawai',
            'password'  => bcrypt('password'),
        ]);

        User::create([
            'name'      => 'Admin',
            'jabatan'   => 'Admin',
            'email'     => 'admin@gmail.com',
            'role'      => 'admin',
            'password'  => bcrypt('password'),
        ]);
    }
}
