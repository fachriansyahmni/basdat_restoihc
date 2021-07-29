<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cabang';
    protected $fillable = [
        'idCabang', 'alamat', 'noHp'
    ];
    public $incrementing = false;
    protected $primaryKey = 'idCabang';
    protected $keyType = 'string';
}
