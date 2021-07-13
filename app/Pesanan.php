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
    protected $table = 'pesanan';
    protected $fillable = [
        'id', 'receiptid', 'noMeja', 'idMenu'
    ];
}
