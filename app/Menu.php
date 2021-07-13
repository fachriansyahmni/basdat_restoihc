<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
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
