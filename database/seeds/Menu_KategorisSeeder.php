<?php

use App\MenuKategori;
use Illuminate\Database\Seeder;

class Menu_KategorisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makanan = new MenuKategori();
        $makanan->name = "Makanan";
        $makanan->save();

        $minuman = new MenuKategori();
        $minuman->name = "Minuman";
        $minuman->save();
    }
}
