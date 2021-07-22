<?php

namespace App\Imports;

use App\Pesanan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;

class PesananImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $idMenu = DB::table('menu')
            ->select('id')
            ->where('namaMenu', $row['menu_pesanan'])
            ->get();

        $receiptid = DB::table('receipt')
            ->select('id')
            ->where('nama_pelanggan', $row['nama_pelanggan'])
            ->get();

        return new Pesanan([
            'receiptid' => $receiptid[0]->id,
            'jmlMenu' => $row['jumlah_menu'],
            'noMeja' => $row['nomor_meja'],
            'idMenu' => $idMenu[0]->id,
        ]);
    }
}
