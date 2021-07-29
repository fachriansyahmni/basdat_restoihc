<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'id' => $row['id'],
            'name' => $row['nama'],
            'username' => $row['username'],
            'password' => bcrypt($row['password']),
            'jabatan' => $row['jabatan'],
        ]);
    }
}
