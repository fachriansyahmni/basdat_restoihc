<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'receipt';
    protected $fillable = [
        'id', 'idPegawai', 'nama_pelanggan', 'totalHarga', 'jmlBayar', 'tglPembelian'
    ];
}
