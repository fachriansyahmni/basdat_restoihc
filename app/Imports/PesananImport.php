<?php

namespace App\Imports;

use App\Pesanan;
use App\Receipt;
use App\User;
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
    public function model(array $rows)
    {
        // $data = [];
        // $datas = [];
        // $receiptids = DB::table('receipt')
        //     ->select('receiptId')
        //     ->where('receiptId', $rows['id_receipt'])
        //     ->get();

        // $idMenu = DB::table('menu')
        //     ->select('id')
        //     ->where('namaMenu', $rows['menu_pesanan'])
        //     ->get();

        // $receiptid = DB::table('receipt')
        //     ->select('receiptId')
        //     ->where('nama_pelanggan', $rows['nama_pelanggan'])
        //     ->get();

        // if ($receiptids[0]->receiptId == $rows['id_receipt']) {

        //     $datas[] = array(
        //         'receiptid' => $receiptid[0]->receiptId,
        //         'jmlMenu' => $rows['jumlah_menu'],
        //         'noMeja' => $rows['nomor_meja'],
        //         'idMenu' => $idMenu[0]->id,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     );
        //     DB::table('pesanan')->insert($datas);
        // } else {
        //     $data[] = array(
        //         'receiptId' => $rows['id_receipt'],
        //         'idPegawai' => $rows['id_pegawai'],
        //         'nama_pelanggan' => $rows['nama_pelanggan'],
        //         'totalHarga' => $rows['total_harga'],
        //         'jmlBayar' => $rows['jumlah_bayar'],
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     );
        //     // }
        //     DB::table('receipt')->insert($data);

        //     $datas[] = array(
        //         'receiptid' => $receiptid[0]->receiptId,
        //         'jmlMenu' => $rows['jumlah_menu'],
        //         'noMeja' => $rows['nomor_meja'],
        //         'idMenu' => $idMenu[0]->id,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     );
        //     // }
        //     DB::table('pesanan')->insert($datas);
        // }

        $Receipt = Receipt::where('receiptId', $rows["id_receipt"])->first();
        if ($Receipt == null) {
            $NewReceipt = new Receipt([
                'receiptId' => $rows['id_receipt'],
                'idPegawai' => User::getIdbyName($rows["nama_pegawai"]),
                'nama_pelanggan' => $rows["nama_pelanggan"],
                'totalHarga' => $rows["total_harga"],
                'jmlBayar' => $rows["jumlah_bayar"]
            ]);
            $NewReceipt->save();
        }
        $Pesanan = Pesanan::where("id", $rows["id_pesanan"])->where("receiptid", $rows["id_receipt"])->first();
        if ($Pesanan == null) {
            $NewPesanan = new Pesanan([
                'receiptid' => $rows["id_receipt"],
                "jmlMenu" => $rows["jumlah_menu"],
                'noMeja' => $rows["nomor_meja"],
                'idMenu' => $rows["id_menu"]
            ]);
            $NewPesanan->save();
        }
    }
}
