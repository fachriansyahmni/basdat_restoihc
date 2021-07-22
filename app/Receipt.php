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
        'receiptId', 'idCabang', 'idPegawai', 'nama_pelanggan', 'totalHarga', 'jmlBayar', 'tglPembelian'
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
        if (self::latest()->first() != null) {
            $num = substr(self::latest()->first()->receiptId, 3, 9) + 1;
        } else {
            $num = 1;
        }
        $num_padded = sprintf("%09d", $num);
        $number = 'A' . date("y") . $num_padded;
        return $number;
    }
}
