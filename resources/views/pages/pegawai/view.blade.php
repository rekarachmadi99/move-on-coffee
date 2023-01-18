@extends('layouts.datatables')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-3">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header text-center">Foto Pegawai</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-thumbnail" width="300px" src="{{ Storage::url('public/img/') . $data->foto_pegawai }}"
                            alt="" />
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header text-center">Detail Data Pegawai</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">NIK</label>
                                    <input class="form-control" value="{{ $data->nik }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Nama</label>
                                    <input class="form-control" value="{{ $data->nama }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Tempat Lahir</label>
                                    <input class="form-control" value="{{ $data->tempat_lahir }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="{{ $data->tanggal_lahir }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Jenis Kelamin</label>
                                    <input class="form-control" value="{{ $data->jenis_kelamin }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Agama</label>
                                    <input class="form-control" value="{{ $data->agama }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Status Penikahan</label>
                                    <input class="form-control" value="{{ $data->status_pernikahan }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputLastName">Alamat</label>
                            <textarea class="form-control" cols="30" rows="3" readonly>{{ $data->alamat }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Nomor Telepon</label>
                                    <input class="form-control" value="{{ $data->nomor_telepon }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Golongan Darah</label>
                                    <input class="form-control" value="{{ $data->golongan_darah }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Jabatan</label>
                                    <input class="form-control" value="{{ $data->jabatan }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputLastName">Tanggal Bekerja</label>
                                    <input type="date" class="form-control" value="{{ $data->tanggal_bekerja }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-danger" href="{{ route('pegawai.index') }}">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
