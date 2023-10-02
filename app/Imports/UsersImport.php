<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'id' => $row[0],
            'name' => $row[1],
            'email' => $row[2],
        ]);
    }

    public function startRow(): int
    {
        return 2;  // Sesuaikan dengan nomor baris yang berisi data (biasanya baris 2 adalah data, bukan header)
    }
}
