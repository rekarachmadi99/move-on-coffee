<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id('nik');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->enum('status_pernikahan', ['Menikah', 'Belum Menikah']);
            $table->text('alamat');
            $table->string('nomor_telepon');
            $table->string('golongan_darah');
            $table->enum('jabatan', ['Owner', 'Admin', 'Bar', 'Kitchen']);
            $table->date('tanggal_bekerja');
            $table->string('foto_pegawai');
            $table->enum('status_pekerjaan', ['Aktif', 'Keluar']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
};
