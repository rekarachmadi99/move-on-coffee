<?php

namespace App\Http\Controllers;

use App\Models\AkunPegawai;
use App\Models\Pegawai;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunPegawaiController extends Controller
{
    public function index()
    {

        $user = Pegawai::where('nik', Auth::user()->nik)->first();
        $list = Pegawai::all();
        $data = AkunPegawai::all();
        return view('pages.akun.index', [
            'title' => 'Akun Pegawai',
            'user' => $user,
            'data' => $data,
            'list' => $list
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'nik' => ['required', Rule::unique('akun_pegawai')],
                'email' => ['required', 'email', Rule::unique('akun_pegawai')],
                'password' => ['required', 'min:6', 'same:konfirmasi_password'],
                'konfirmasi_password' => ['required', 'min:6']
            ],
            [
                'nik.required' => 'NIK tidak boleh kosong!',
                'nik.unique' => 'NIK sudah digunakan!',
                'email.required' => 'Email tidak boleh kosong!',
                'email.unique' => 'Email sudah digunakan!',
                'password.required' => 'Password tidak boleh kosong!',
                'password.min' => 'Password tidak boleh kurang dari 6 karakter!',
                'password.same' => 'Password dan konfirmasi password tidak sama',
                'konfirmasi_password.required' => 'Konfirmasi password tidak boleh kosong!',
                'konfirmasi_password.min' => 'Konfirmasi password tidak boleh kurang dari 6 karakter!'
            ]
        );


        $store = new AkunPegawai();
        $store->nik = $request->nik;
        $store->email = $request->email;
        $store->password = bcrypt($request->password);
        $store->role = $request->role;
        $store->save();

        return redirect(route('akun.pegawai.index'))->with('success', 'Akun baru berhasil ditambah!');
    }

    public function edit($id)
    {
        $user = Pegawai::where('nik', Auth::user()->nik)->first();
        $data = AkunPegawai::where('nik', $id)->first();

        return view('pages.akun.edit', [
            'title' => 'Edit Akun Pegawai',
            'user' => $user,
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password_baru' => ['same:konfirmasi_password'],
        ]);

        $update = AkunPegawai::where('nik', $request->nik);
        if ($request->password_baru != null) {
            $data = [
                'email' => $request->email,
                'password' => bcrypt($request->password_baru),
                'role' => $request->role
            ];
        } else {
            $data = [
                'email' => $request->email,
                'role' => $request->role
            ];
        }
        $update->update($data);

        return redirect(route('akun.pegawai.index'))->with('success', 'Akun pegawai berhasil diupdate!');
    }

    public function destroy($id)
    {
        $data = AkunPegawai::where('nik', $id);
        $data->delete();
        return redirect(route('akun.pegawai.index'))->with('success', 'Akun pegawai berhasil dihapus!');
    }
}
