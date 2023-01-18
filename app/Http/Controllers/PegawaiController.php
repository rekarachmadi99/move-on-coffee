<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class PegawaiController extends Controller
{
    public function index()
    {
        $user = Pegawai::where('nik', Auth::user()->nik)->first();
        $data = Pegawai::all();
        return view('pages.pegawai.index', [
            'title' => 'Data Pegawai',
            'user' => $user,
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'foto_pegawai' => 'image|file|max:5048',
            'nama' => 'required',
            'jenis_kelamin' => 'required'
        ], [
            'foto_pegawai.image' => 'File yang dimasukan harus berupa foto!',
            'foto_pegawai.max' => 'Ukuran foto tidak lebih dari 5MB'
        ]);

        $store = new Pegawai();
        $store->nik = $request->nik;
        $store->nama = $request->nama;
        $store->jenis_kelamin = $request->jenis_kelamin;
        $store->tempat_lahir = $request->tempat_lahir;
        $store->tanggal_lahir = $request->tanggal_lahir;
        $store->jenis_kelamin = $request->jenis_kelamin;
        $store->agama = $request->agama;
        $store->status_pernikahan = $request->status_pernikahan;
        $store->nomor_telepon = $request->nomor_telepon;
        $store->golongan_darah = $request->golongan_darah;
        $store->jabatan = $request->jabatan;
        $store->alamat = $request->alamat;
        $store->tanggal_bekerja = $request->tanggal_bekerja;
        $store->status_pekerjaan = 'Aktif';
        if ($request->hasFile('foto_pegawai')) {
            $request->file('foto_pegawai')->store('public/img');
            $store->foto_pegawai = $request->file('foto_pegawai')->hashName();
        }
        if (!$request->hasFile('foto_pegawai')) {
            $store->foto_pegawai = 'default_foto.jpg';
        }
        $store->save();

        return redirect(route('pegawai.index'))->with('success', 'Data pegawai berhasil ditambah!');
    }

    public function edit($id)
    {
        $user = Pegawai::where('nik', Auth::user()->nik)->first();
        $data = Pegawai::where('nik', $id)->first();
        return view('pages.pegawai.edit', [
            'title' => 'Data Pegawai',
            'user' => $user,
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'foto_pegawai' => 'image|file|max:5048',
        ], [
            'foto_pegawai.image' => 'File yang dimasukan harus berupa foto!',
            'foto_pegawai.max' => 'Ukuran foto tidak lebih dari 5MB'
        ]);

        $update = Pegawai::where('nik', $request->nik);
        $tampung = Pegawai::where('nik', $request->nik)->first();

        if ($request->hasFile('foto_pegawai')) {
            $data = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'nomor_telepon' => $request->nomor_telepon,
                'golongan_darah' => $request->golongan_darah,
                'jabatan' => $request->jabatan,
                'alamat' => $request->alamat,
                'tanggal_bekerja' => $request->tanggal_bekerja,
                'foto_pegawai' => $request->file('foto_pegawai')->hashName()
            ];
            $request->file('foto_pegawai')->store('public/img');
            if ($tampung->foto_pegawai != 'default_foto.jpg') {
                Storage::delete('public/img/' . $tampung->foto_pegawai);
            }
        }
        if (!$request->hasFile('foto_pegawai')) {
            $data = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'status_pernikahan' => $request->status_pernikahan,
                'nomor_telepon' => $request->nomor_telepon,
                'golongan_darah' => $request->golongan_darah,
                'jabatan' => $request->jabatan,
                'alamat' => $request->alamat,
                'tanggal_bekerja' => $request->tanggal_bekerja
            ];
        }
        $update->update($data);

        return redirect(route('pegawai.index'))->with('success', 'Data pegawai berhasil di update!');
    }

    public function view($id)
    {
        $user = Pegawai::where('nik', Auth::user()->nik)->first();
        $data = Pegawai::where('nik', $id)->first();
        return view('pages.pegawai.view', [
            'title' => 'Detail Data Pegawai',
            'user' => $user,
            'data' => $data
        ]);
    }
}
