<?php

namespace App\Exports;

use App\Pesanan;
use App\Menu;
use App\User;
use App\Receipt;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class PesananExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    public function headings(): array
    {
        return [
            'Nama Pegawai',
            'Nama Pelanggan',
            'Nomor Meja',
            'Menu Pesanan',
            'Jumlah Menu',
            'Total Harga',
            'Jumlah Bayar',
        ];
    }

    public function collection()
    {
        $pesanan = DB::table('pesanan')
            ->join('receipt', 'pesanan.receiptid', '=', 'receipt.id')
            ->join('users', 'users.id', '=', 'receipt.idPegawai')
            ->join('menu', 'menu.id', '=', 'pesanan.idMenu')
            ->select('users.name', 'receipt.nama_pelanggan', 'pesanan.noMeja', 'menu.namaMenu', 'pesanan.jmlMenu', 'receipt.totalHarga', 'receipt.jmlBayar')
            ->get();
        return $pesanan;
        // return Pesanan::all();
    }
}
