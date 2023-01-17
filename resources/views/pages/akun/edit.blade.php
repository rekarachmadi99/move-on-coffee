@extends('layouts.form')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Akun Pegawai</h1>
        <p class="mb-4">Halaman ini digunakan untuk mengedit akun pegawai.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Akun Pegawai</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('akun.pegawai.update') }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik" value="{{ $data->nik }}"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email'){{ 'is-invalid' }}@enderror"
                            name="email" id="email" value="{{ $data->email }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="password_baru">Password Baru</label>
                                <input type="text"
                                    class="form-control @error('password_baru'){{ 'is-invalid' }}@enderror"
                                    name="password_baru" id="password_baru">
                                <p>*Jika password tidak ingin di ganti kosongkan!</p>
                                @error('password_baru')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group">
                                <label for="konfirmasi_password">Konfirmasi Password</label>
                                <input type="text"
                                    class="form-control @error('konfirmasi_password'){{ 'is-invalid' }}@enderror"
                                    name="konfirmasi_password" id="konfirmasi_password">
                                @error('konfirmasi_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="role" id="role">
                            <option @if ($data->role == 'Admin') {{ 'selected' }} @endif value="Admin">Admin
                            </option>
                            <option @if ($data->role == 'Owner') {{ 'selected' }} @endif value="Owner">Owner
                            </option>
                            <option @if ($data->role == 'Pegawai') {{ 'selected' }} @endif value="Pegawai">Pegawai
                            </option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Update Data">
                </form>
            </div>
        </div>
    </div>
@endsection
