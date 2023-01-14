@extends('layouts.dataTables')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pegawai</h1>
        <p class="mb-4">Halaman ini menampilkan data pegawai yang bekerja di Move On Caffee & Space.</p>

        <!-- DataTales Example -->
        @include('partials.sessionAlert')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
            </div>
            <div class="card-body">
                <a href="" class="btn btn-success mb-2"><i class="fa fa-print" aria-hidden="true"> Eksport Excel</i></a>
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
                                <th>Jabatan</th>
                                <th>Option</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $id = 1;
                            @endphp
                            @foreach ($data_pegawai as $data_pegawai)
                                <tr>
                                    <td>{{ $id++ }}</td>
                                    <td>{{ $data_pegawai->foto_pegawai }}</td>
                                    <td>{{ $data_pegawai->nama }}</td>
                                    <td>{{ $data_pegawai->tempat_lahir . ', ' . $data_pegawai->tanggal_lahir }}</td>
                                    <td>{{ $data_pegawai->no_phone }}</td>
                                    <td>{{ $data_pegawai->alamat }}</td>
                                    <td>{{ $data_pegawai->jabatan }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('edit.akun.pegawai.get', $data_pegawai->nik) }}"
                                            class="btn btn-primary mr-2"><i class="fa fa-pencil-square-o"
                                                aria-hidden="true"></i></a>
                                        <a href="{{ route('edit.akun.pegawai.get', $data_pegawai->nik) }}"
                                            class="btn btn-success mr-2"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <form action="{{ route('destroy.akun.pegawai.delete', $data_pegawai->nik) }}"
                                            method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Anda yakin ingin menghapus record ini?')"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
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
