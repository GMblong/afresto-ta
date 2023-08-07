<?php

namespace App\Imports;

use App\Models\Alumni;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ExcelImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 3;
    }
    public function model(array $row)
    {

        $data = [
            'nama'          => $row[1] == null ? 'a' : $row[1],
            'nis'           => $row[2] == null ? '1' : $row[2],
            'telp'          => $row[3] == null ? 'a' : $row[3],
            'tgl_lahir'     => Carbon::parse($row[4]),
            'kelamin'       => $row[5] == null ? 'a' : $row[5],
            'jurusan'       => $row[6] == null ? 'a' : $row[6],
            'thn_lulus'     => $row[7] == null ? 'a' : $row[7],
            'keterserapan'  => $row[8] == null ? 'a' : $row[8],
            'alamat'        => $row[9] == null ? 'a' : $row[9],
        ];
        return new Alumni($data);
    }
}
