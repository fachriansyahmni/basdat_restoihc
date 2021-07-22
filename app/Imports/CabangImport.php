<?php

namespace App\Imports;

use App\Cabang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CabangImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Cabang([
            'id' => $row['id'],
            'alamat' => $row['alamat'],
            'noHp' => $row['nomor_hp'],
        ]);
    }
}
