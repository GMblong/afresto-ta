<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Alumni as Authenticatable;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumnis';
    protected $primarykey = 'id';
    protected $fillable = [
        'nama', 'nis', 'telp', 'tgl_lahir', 'kelamin', 'jurusan', 'thn_lulus',
        'keterserapan', 'alamat'
    ];

}
