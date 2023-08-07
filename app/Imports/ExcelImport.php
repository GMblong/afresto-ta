<?php

namespace App\Imports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ExcelImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Alumni([
            'id'            => $row['id'],
            'nama'          => $row['nama'],
            'nis'           => $row['nis'],
            'telp'          => $row['telp'],
            'tgl_lahir'     => $row['tgl_lahir'],
            'kelamin'       => $row['kelamin'],
            'jurusan'       => $row['jurusan'],
            'thn_lulus'     => $row['thn_lulus'],
            'keterserapan'  => $row['keterserapan'],
            'alamat'        => $row['alamat'],
            'password'      => $row['password'],
            'created_at'    => $row['created_at'],
            'updated_at'    => $row['updated_at'],
        ]);
    }
}