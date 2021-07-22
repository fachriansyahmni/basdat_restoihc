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
        'idCabang', 'idPegawai', 'nama_pelanggan', 'totalHarga', 'jmlBayar', 'tglPembelian'
    ];
    public $incrementing = false;
    protected $primaryKey = 'receiptId';
    protected $keyType = 'string';

    public function d_pesanan()
    {
        return $this->hasMany(Pesanan::class, 'receiptid', 'receiptId');
    }

    public static function generateId()
    {
        dd(date("y"));
    }
}
