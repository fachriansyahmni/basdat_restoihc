<?php

namespace App\Exports;

use App\Menu;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class MenuExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    public function headings(): array
    {
        return [
            'Menu',
            'Harga',
        ];
    }

    public function collection()
    {
        $cabang = DB::table('menu')->select('namaMenu', 'harga')->get();
        return $cabang;
        // return Menu::all();
    }
}
