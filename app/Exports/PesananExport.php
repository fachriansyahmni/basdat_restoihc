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
            'Id Pegawai',
            'Nama Pegawai',
            'Id Receipt',
            'Nama Pelanggan',
            'Id Pesanan',
            'Nomor Meja',
            'Jumlah Menu',
            'Id Menu',
            'Menu Pesanan',
            'Id Kategori',
            'Kategori',
            'Total Harga',
            'Jumlah Bayar',
        ];
    }

    public function collection()
    {
        $pesanan = DB::table('pesanan')
            ->join('receipt', 'pesanan.receiptid', '=', 'receipt.receiptId')
            ->join('users', 'users.id', '=', 'receipt.idPegawai')
            ->join('menu', 'menu.id', '=', 'pesanan.idMenu')
            ->join('menu_kategoris', 'menu.menu_kategori_id', '=', 'menu_kategoris.id')
            ->select(
                'users.id',
                'users.name',
                'receipt.receiptId',
                'receipt.nama_pelanggan',
                'pesanan.id as idPesanan',
                'pesanan.noMeja',
                'pesanan.jmlMenu',
                'menu.id as idMenu',
                'menu.namaMenu',
                'menu_kategoris.id as idKategori',
                'menu_kategoris.name as kategori',
                'receipt.totalHarga',
                'receipt.jmlBayar'
            )
            // ->select('pesanan.id')
            ->get();
        // $Pesanan2 = Pesanan::get(); //kalau pake model
        // dd($Pesanan2, $pesanan);
        return $pesanan;
        // return Pesanan::all();
    }
}
