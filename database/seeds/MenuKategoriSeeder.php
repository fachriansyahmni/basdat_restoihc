<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_kategoris')->insert([
            'name' => "makanan",
        ]);
        DB::table('menu_kategoris')->insert([
            'name' => "minuman",
        ]);
    }
}
