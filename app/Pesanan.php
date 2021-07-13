<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
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
