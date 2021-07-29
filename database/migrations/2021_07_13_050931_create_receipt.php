<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt', function (Blueprint $table) {
            $table->string("receiptId")->unique();
            $table->string("idCabang")->nullable();
            $table->unsignedBigInteger("idPegawai")->nullable();
            $table->string("nama_pelanggan")->nullable();
            $table->integer("totalHarga")->default(0);
            $table->integer("jmlBayar")->default(0);
            $table->timestamp("tglPembelian")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipt');
    }
}
