<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    public function headings(): array
    {
        return [
            'Id',
            'Nama',
            'Username',
            'Password',
            'Jabatan',
        ];
    }

    public function collection()
    {
        $cabang = DB::table('users')->select('id', 'name', 'username', 'password', 'jabatan')->get();
        return $cabang;
        // return User::all();
    }
}
