<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMenuKategoriFieldToMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->unsignedBigInteger("menu_kategori_id")->nullable();

            $table->foreign('menu_kategori_id')->references('id')->on('menu_kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu', function (Blueprint $table) {
            $table->dropColumn('menu_kategori_id');
            $table->dropForeign('menu_kategori_id_foreign');
        });
    }
}
