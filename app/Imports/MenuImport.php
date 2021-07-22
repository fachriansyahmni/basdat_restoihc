<?php

namespace App\Imports;

use App\Menu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Menu([
            'id' => $row['id'],
            'namaMenu' => $row['menu'],
            'harga' => $row['harga'],
        ]);
    }
}
