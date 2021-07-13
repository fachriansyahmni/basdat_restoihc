<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->username = "admin";
        $admin->jabatan = "admin";
        $admin->password = bcrypt("admin");
        $admin->name = "administrator";
        $admin->save();

        $pegawai = new User();
        $pegawai->username = "pegawai1";
        $pegawai->jabatan = "pegawai";
        $pegawai->password = bcrypt("pegawai1");
        $pegawai->name = "pegawai 1";
        $pegawai->save();
    }
}
