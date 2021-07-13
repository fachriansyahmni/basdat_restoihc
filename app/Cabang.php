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
    protected $fillable = [
        'User', 'Cabang', 'Receipt', 'Menu', 'Pesanan'
    ];
}
