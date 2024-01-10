<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\Golongan;
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
            'name'      => 'Cahyo Yudho Putranto, A.Md',
            'email'     => 'pegawai@gmail.com',
            'role'      => 'pegawai',
            'jabatan'   => 'Kepala Bidang Penelitian dan Pengembangan',
            'golongan'  => 'V',
            'kontak'    => '08123456789',
            'password'  => bcrypt('password'),
        ]);

        User::create([
            'name'      => 'Ema Achirul R, S.Sos',
            'email'     => 'ema@gmail.com',
            'role'      => 'pegawai',
            'jabatan'   => 'Sekretariat',
            'golongan'  => 'III',
            'kontak'    => '08123456789',
            'password'  => bcrypt('password'),
        ]);

        User::create([
            'name'      => 'Indah Kusumawardhani, S.Pt., M.Si',
            'email'     => 'admin@gmail.com',
            'role'      => 'admin',
            'jabatan'   => 'Kepala Bidang Penelitian dan Pengembangan',
            'golongan'  => 'VI',
            'kontak'    => '08123456789',
            'password'  => bcrypt('password'),
        ]);

        // Seed Golongans

        $golongans = [
            'I',
            'II',
            'III',
            'IV',
            'V',
            'VI',
            'VII',
            'VIII',
            'IX',
            'X',
            'XI',
            'XII',
            'XIII',
            'XIV',
            'XV',
            'XVI',
            'XVII',
        ];

        foreach ($golongans as $golongan) {
            Golongan::create([
                'nama_golongan' => $golongan,
            ]);
        }

        $jabatans = [
            'Sekretariat',
            'Kepala Bidang Penelitian dan Pengembangan',
            'Kepala Bidang Perencanaan dan Perekonomian',
            'Kepala Bidang Infrastruktur dan Kewilayahan',
            'Kepala Bidang Perencanaan Sosial, Budaya dan Pemerintahan',
        ];

        foreach ($jabatans as $jabatan) {
            Jabatan::create([
                'nama_jabatan' => $jabatan,
            ]);
        }
    }
}
