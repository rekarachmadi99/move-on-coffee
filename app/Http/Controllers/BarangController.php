<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $barang = Barang::select('data_barang.id_barang as id_barang', 'data_barang.nama as nama', 'data_barang.quantity as quantity', 'data_barang.harga_satuan as harga_satuan', 'data_barang.foto_barang as foto_barang', 'kategori_barang.nama as nama_kategori')->join('kategori_barang', 'kategori_barang.id_kategori', '=', 'data_barang.id_kategori')->get();
        $list_kategori = KategoriBarang::all();
        return view('pages.inventaris.index', [
            'title' => 'Data Barang',
            'user' => $user,
            'list_kategori' => $list_kategori,
            'barang' => $barang
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => ['required'],
            'quantity' => ['required'],
            'harga_satuan' => ['required'],
            'foto_barang' => ['required', 'image', 'file', 'max:5048']
        ], [
            'nama.required' => 'Nama barang tidak boleh kosong!',
            'quantity.required' => 'Quantity tidak boleh kosong!',
            'harga_satuan.required' => 'Harga satuan tidak boleh kosong!',
            'foto_barang.required' => 'Foto barang tidak boleh kosong!',
            'foto_barang.image' => 'FIle yang dimasukan harus berupa foto!',
            'foto_barang.max' => 'Ukuran foto tidak lebih dari 5 MB!'
        ]);

        $store = new Barang();
        $store->nama = $request->nama;
        $store->quantity = $request->quantity;
        $store->harga_satuan = $request->harga_satuan;
        $store->id_kategori = $request->id_kategori;
        if ($request->hasFile('foto_barang')) {
            $request->file('foto_barang')->store('public/img');
            $store->foto_barang = $request->file('foto_barang')->hashName();
        }
        $store->save();

        return redirect(route('barang.index'))->with('success', 'Data barang berhasil ditambah!');
    }

    public function edit($id)
    {
        $user = Pegawai::where('nik', Auth::user()->nik)->first();
        $barang = Barang::where('id_barang', $id)->first();
        $list_kategori = KategoriBarang::all();
        return view('pages.inventaris.edit', [
            'title' => 'Edit Data Barang',
            'user' => $user,
            'barang' => $barang,
            'list_kategori' => $list_kategori
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'quantity' => 'required',
            'harga_satuan' => 'required',
        ], [
            'nama.required' => 'Nama barang tidak boleh kosong!',
            'quantity.required' => 'Quantity tidak boleh kosong!',
            'harga_satuan.required' => 'Harga satuan tidak boleh kosong!'
        ]);

        $data_barang = Barang::where('id_barang', $request->id_barang)->first();
        $update = Barang::where('id_barang', $request->id_barang);
        if ($request->hasFile('foto_barang')) {
            Storage::delete('public/img/' . $data_barang->foto_barang);
            $request->file('foto_barang')->store('public/img');
            $update->update([
                'nama' => $request->nama,
                'quantity' => $request->quantity,
                'harga_satuan' => $request->harga_satuan,
                'id_kategori' => $request->id_kategori,
                'foto_barang' => $request->file('foto_barang')->hashName()
            ]);
            return redirect(route('barang.index'))->with('success', 'Data barang berhasil diupdate!');
        }
        $update->update([
            'nama' => $request->nama,
            'quantity' => $request->quantity,
            'harga_satuan' => $request->harga_satuan,
            'id_kategori' => $request->id_kategori,
        ]);

        return redirect(route('barang.index'))->with('success', 'Data barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $destroy = Barang::where('id_barang', $id);
        Storage::delete('public/img/' . $destroy->foto_barang);
        $destroy->delete();

        return redirect(route('barang.index'))->with('success', 'Data barang berhasil dihapus!');
    }
}
