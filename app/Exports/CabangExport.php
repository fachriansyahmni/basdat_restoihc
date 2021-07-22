<?php

namespace App\Exports;

use App\Cabang;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class CabangExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    public function headings(): array
    {
        return [
            'Id',
            'Alamat',
            'Nomor Hp',
        ];
    }

    public function collection()
    {
        //     return Cabang::all();
        $cabang = DB::table('cabang')->select('id', 'alamat', 'noHp')->get();
        return $cabang;
    }



    // public function query()
    // {
    //     // return Invoice::query();
    //     $cabang = DB::table('cabang')->select('alamat', 'noHp')->get();
    //     return $cabang;
    // }
}
