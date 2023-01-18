@extends('layouts.form')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Edit Data Pegawai</h1>
        <p class="mb-4">Halaman ini digunakan untuk mengedit data pegawai.</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Pegawai</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('pegawai.update') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" name="nik" id="nik"
                                    class="form-control @error('nik') {{ 'is-invalid' }} @enderror"
                                    value="{{ $data->nik }}" readonly>
                                @error('nik')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama"
                                    class="form-control @error('nama') {{ 'is-invalid' }} @enderror"
                                    value="{{ $data->nama }}">
                                @error('nama')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option @if ($data->jenis_kelamin == 'Laki-laki') {{ 'selected' }} @endif value="Laki-laki">
                                        Laki-laki</option>
                                    <option @if ($data->jenis_kelamin == 'Perempuan') {{ 'selected' }} @endif value="Perempuan">
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                                            class="form-control @error('tempat_lahir') {{ 'is-invalid' }} @enderror"
                                            value="{{ $data->tempat_lahir }}">
                                        @error('tempat_lahir')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                            class="form-control @error('tanggal_lahir') {{ 'is-invalid' }} @enderror"
                                            value="{{ $data->tanggal_lahir }}">
                                        @error('tanggal_lahir')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama">Agama</label>
                                <input type="text" name="agama" id="agama"
                                    class="form-control @error('nama') {{ 'is-invalid' }} @enderror"
                                    value="{{ $data->agama }}">
                                @error('nama')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status_pernikahan">Status Pernikahan</label>
                                <select class="form-control" name="status_pernikahan" id="status_pernikahan">
                                    <option @if ($data->status_pernikahan == 'Menikah') {{ 'selected' }} @endif value="Menikah">
                                        Menikah</option>
                                    <option @if ($data->status_pernikahan == 'Belum Menikah') {{ 'selected' }} @endif
                                        value="Belum Menikah">Belum Menikah</option>
                                </select>
                                @error('status_pernikahan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-gorup mb-2">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                    </div>
                                    <input type="number" name="nomor_telepon" id="nomor_telepon"
                                        class="form-control @error('nomor_telepon') {{ 'is-invalid' }} @enderror"
                                        value="{{ $data->nomor_telepon }}" aria-describedby="basic-addon1">
                                    @error('nomor_telepon')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="golongan_darah">Golongan Darah</label>
                                <select class="form-control" name="golongan_darah" id="golongan_darah">
                                    <option @if ($data->golongan_darah == 'A') {{ 'selected' }} @endif value="A">A
                                    </option>
                                    <option @if ($data->golongan_darah == 'B') {{ 'selected' }} @endif value="B">B
                                    </option>
                                    <option @if ($data->golongan_darah == 'AB') {{ 'selected' }} @endif value="AB">AB
                                    </option>
                                    <option @if ($data->golongan_darah == 'O') {{ 'selected' }} @endif value="O">O
                                    </option>
                                </select>
                                @error('golongan_darah')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select class="form-control" name="jabatan" id="jabatan">
                                    <option @if ($data->jabatan == 'Owner') {{ 'selected' }} @endif value="Owner">
                                        Owner</option>
                                    <option @if ($data->jabatan == 'Admin') {{ 'selected' }} @endif value="Admin">
                                        Admin</option>
                                    <option @if ($data->jabatan == 'Bar') {{ 'selected' }} @endif value="Bar">
                                        Bar</option>
                                    <option @if ($data->jabatan == 'Kitchen') {{ 'selected' }} @endif
                                        value="Kitchen">
                                        Kitchen</option>
                                </select>
                                @error('jabatan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tanggal_bekerja">Tanggal Mulai Bekerja</label>
                                <input type="date" name="tanggal_bekerja" id="tanggal_bekerja"
                                    class="form-control @error('tanggal_bekerja') {{ 'is-invalid' }} @enderror"
                                    value="{{ $data->tanggal_bekerja }}">
                                @error('tanggal_bekerja')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3">{{ $data->alamat }}</textarea>
                                @error('nama')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status_pekerjaan">Status Pekerjaan</label>
                                <select class="form-control" name="status_pekerjaan" id="status_pekerjaan">
                                    <option @if ($data->status_pekerjaan == 'Aktif') {{ 'selected' }} @endif value="Aktif">
                                        Aktif</option>
                                    <option @if ($data->status_pekerjaan == 'Keluar') {{ 'selected' }} @endif value="Keluar">
                                        Keluar</option>
                                </select>
                                @error('jabatan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto_pegawai">Foto Pegawai</label>
                                <input type="file" name="foto_pegawai" id="foto_pegawai" class="form-control">
                                <p>*Jika foto pegawai tidak akan di update, kosongkan!</p>
                                @error('foto_pegawai')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Update Data">
                </form>
            </div>
        </div>
    </div>
@endsection
