<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'nama_perusahaan', 'lokasi_perusahaan', 'deskripsi'
    ];
}
