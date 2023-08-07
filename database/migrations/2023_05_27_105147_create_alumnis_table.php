<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nis')->unique();
            $table->string('telp')->unique();
            $table->datetime('tgl_lahir')->format('d M Y');
            $table->string('kelamin');
            $table->string('jurusan');
            $table->string('thn_lulus');
            $table->string('keterserapan');
            $table->string('alamat');
            $table->string('password')->default(Str::random(6));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
