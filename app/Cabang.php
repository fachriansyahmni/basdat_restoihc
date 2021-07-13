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
        'alamat', 'noHp'
    ];
}
