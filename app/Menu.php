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
    protected $table = 'menu';
    protected $fillable = [
        'namaMenu', 'harga', 'menu_kategori_id'
    ];

    public static function getIdMenuByName($name)
    {
        return self::where("namaMenu", $name)->first();
    }

    public function kategoriName()
    {
        return $this->hasOne(MenuKategori::class, "id", "menu_kategori_id");
    }
}
