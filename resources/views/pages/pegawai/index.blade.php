@extends('layouts.dataTables')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
        <p class="mb-4">Halaman ini menampilkan data pegawai yang bekerja di Move On Caffee & Space.</p>

        <!-- DataTales Example -->
        @include('partials.session_alerts')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah_pegawai">
                        <i class="fa fa-plus"></i>
                        Tambah Pegawai
                    </button>
                </div>
            </div>

            {{-- Modal - Tambah Pegawai --}}
            <div class="modal fade" id="tambah_pegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('pegawai.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="number" name="nik" id="nik"
                                                class="form-control @error('nik') {{ 'is-invalid' }} @enderror"
                                                value="{{ old('nik') }}">
                                            @error('nik')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control @error('nama') {{ 'is-invalid' }} @enderror"
                                                value="{{ old('nama') }}">
                                            @error('nama')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                                <option @if (old('jenis_kelamin') == 'Laki-laki') {{ 'selected' }} @endif
                                                    value="Laki-laki">
                                                    Laki-laki</option>
                                                <option @if (old('jenis_kelamin') == 'Perempuan') {{ 'selected' }} @endif
                                                    value="Perempuan">
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                                        class="form-control @error('tempat_lahir') {{ 'is-invalid' }} @enderror"
                                                        value="{{ old('tempat_lahir') }}">
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
                                                        value="{{ old('tanggal_lahir') }}">
                                                    @error('tanggal_lahir')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <input type="text" name="agama" id="agama"
                                                class="form-control @error('agama') {{ 'is-invalid' }} @enderror"
                                                value="{{ old('agama') }}">
                                            @error('agama')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="status_pernikahan">Status Pernikahan</label>
                                            <select class="form-control" name="status_pernikahan" id="status_pernikahan">
                                                <option @if (old('status_pernikahan') == 'Menikah') {{ 'selected' }} @endif
                                                    value="Menikah">Menikah</option>
                                                <option @if (old('status_pernikahan') == 'Belum Menikah') {{ 'selected' }} @endif
                                                    value="Belum Menikah">Belum Menikah</option>
                                            </select>
                                            @error('status_pernikahan')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-gorup">
                                            <label for="nomor_telepon">Nomor Telepon</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                                </div>
                                                <input type="number" name="nomor_telepon" id="nomor_telepon"
                                                    class="form-control @error('nomor_telepon') {{ 'is-invalid' }} @enderror"
                                                    value="{{ old('nomor_telepon') }}" aria-describedby="basic-addon1">
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
                                                <option @if (old('golongan_darah') == 'A') {{ 'selected' }} @endif
                                                    value="A">A</option>
                                                <option @if (old('golongan_darah') == 'B') {{ 'selected' }} @endif
                                                    value="B">B</option>
                                                <option @if (old('golongan_darah') == 'AB') {{ 'selected' }} @endif
                                                    value="AB">AB</option>
                                                <option @if (old('golongan_darah') == 'O') {{ 'selected' }} @endif
                                                    value="O">O</option>
                                            </select>
                                            @error('golongan_darah')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <select class="form-control" name="jabatan" id="jabatan">
                                                <option @if (old('jabatan') == 'Owner') {{ 'selected' }} @endif
                                                    value="Owner">Owner</option>
                                                <option @if (old('jabatan') == 'Admin') {{ 'selected' }} @endif
                                                    value="Admin">Admin</option>
                                                <option @if (old('jabatan') == 'Bar') {{ 'selected' }} @endif
                                                    value="Bar">Bar</option>
                                                <option @if (old('jabatan') == 'Kitchen') {{ 'selected' }} @endif
                                                    value="Kitchen">Kitchen</option>
                                            </select>
                                            @error('jabatan')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_bekerja">Tanggal Mulai Bekerja</label>
                                            <input type="date" name="tanggal_bekerja" id="tanggal_bekerja"
                                                class="form-control @error('tanggal_bekerja') {{ 'is-invalid' }} @enderror"
                                                value="{{ old('tanggal_bekerja') }}">
                                            @error('tanggal_bekerja')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Alamat</label>
                                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3">{{ old('alamat') }}</textarea>
                                            @error('nama')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="foto_pegawai">Foto Pegawai</label>
                                            <input type="file" name="foto_pegawai" id="foto_pegawai"
                                                class="form-control">
                                            @error('foto_pegawai')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <a href="" class="btn btn-success mb-2"><i class="fa fa-print" aria-hidden="true"> Eksport
                        PDF</i></a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Pegawai</th>
                                <th>Nama Pegawai</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>Status Pekerjaan</th>
                                <th>Jabatan</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Foto Pegawai</th>
                                <th>Nama Pegawai</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>Status Pekerjaan</th>
                                <th>Jabatan</th>
                                <th>Option</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $id = 1;
                            @endphp
                            @foreach ($data as $data_pegawai)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td><img class="img-thumbnail"
                                            src="{{ Storage::url('public/img/') . $data_pegawai->foto_pegawai }}"
                                            alt="{{ $data_pegawai->foto_pegawai }}" style="width: 100px; height: 120px;">
                                    </td>
                                    <td>{{ $data_pegawai->nama }}</td>
                                    <td>{{ $data_pegawai->tempat_lahir . ', ' . $data_pegawai->tanggal_lahir }}</td>
                                    <td>{{ $data_pegawai->nomor_telepon }}</td>
                                    <td>{{ $data_pegawai->alamat }}</td>
                                    <td class="text-center">
                                        @if ($data_pegawai->status_pekerjaan == 'Aktif')
                                            <p class="btn btn-success">{{ $data_pegawai->status_pekerjaan }}</p>
                                        @else
                                            <p class="btn btn-danger">{{ $data_pegawai->status_pekerjaan }}</p>
                                        @endif
                                    </td>
                                    <td>{{ $data_pegawai->jabatan }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('pegawai.edit', $data_pegawai->nik) }}"
                                            class="btn btn-primary mr-2"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></a>
                                        <a href="{{ route('pegawai.view', $data_pegawai->nik) }}"
                                            class="btn btn-success mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
