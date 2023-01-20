<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    // Kategori Barang
    public function kategori_index()
    {
        $user = Pegawai::where('nik', Auth::user()->nik)->first();
        $kategori = KategoriBarang::all();
        return view('pages.inventaris.kategori', [
            'title' => 'Kategori Barang',
            'user' => $user,
            'kategori' => $kategori
        ]);
    }

    public function kategori_store(Request $request)
    {
        $this->validate($request, [
            'kategori_barang' => ['required']
        ], [
            'kategori_barang.required' => 'Kategori barang jangan dikosongkan!'
        ]);

        $store = new KategoriBarang();
        $store->nama = $request->kategori_barang;
        $store->save();

        return redirect(route('kategori.index'))->with('success', 'Data berhasil ditambah!');
    }

    public function kategori_destroy($id)
    {
        $destroy = KategoriBarang::where('id_kategori', $id);
        $destroy->delete();

        return redirect(route('kategori.index'))->with('success', 'Kategori barang berhasil dihapus!');
    }

    // Barang
    public function index()
    {
        $user = Pegawai::where('nik', Auth::user()->nik)->first();
        $list_kategori = KategoriBarang::all();
        return view('pages.inventaris.index', [
            'title' => 'Data Barang',
            'user' => $user,
            'list_kategori' => $list_kategori
        ]);
    }

    public function store()
    {
    }
}
