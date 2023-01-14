<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'nik';
    protected $fillable = [
        'nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'status_pernikahan', 'alamat', 'nomor_telepon', 'golongan_darah', 'jabatan', 'tanggal_bekerja', 'foto_pegawai', 'status_pekerjaan'
    ];
}
