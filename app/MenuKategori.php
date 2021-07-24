<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuKategori extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
}
