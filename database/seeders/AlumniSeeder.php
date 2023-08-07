<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        DB::table('alumnis')->insert([
            'nama' => Str::random(10),
            'nis' => Int::random(8),
            'telp' => Int::random(10),
        ]);
    }
}