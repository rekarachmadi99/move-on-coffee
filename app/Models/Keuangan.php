<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    use HasFactory;
    protected $table = 'keuangan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'keterangan', 'jenis_transaksi', 'nominal', 'foto_nota'
    ];
}
