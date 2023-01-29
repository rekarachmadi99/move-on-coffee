<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemasukanController extends Controller
{

    public function index()
    {
        $user = Pegawai::where('nik', Auth::user()->nik)->first();
        return view('pages.keuangan.pemasukan.index', [
            'title' => 'Laporan Pemasukan',
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
    }

    public function edit($id)
    {
        return view('');
    }

    public function update()
    {
        return view('');
    }

    public function destroy($id)
    {
        return view('');
    }
}
