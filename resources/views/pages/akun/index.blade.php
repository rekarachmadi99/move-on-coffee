@extends('layouts.dataTables')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Akun Pegawai</h1>
        <p class="mb-4">Halaman ini menampilkan data akun pegawai yang masih aktif bekerja.</p>
        @if (!Session::get('errors'))
            @include('partials.session_alerts')
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Akun Pegawai</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width='2%'>ID</th>
                                        <th>NIK</th>
                                        <th>Email</th>
                                        <th>Role Akun</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>NIK</th>
                                        <th>Email</th>
                                        <th>Role Akun</th>
                                        <th>Option</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                        $id = 1;
                                    @endphp
                                    @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->role }}</td>
                                            <td class="d-flex justify-content-center">
                                                <a href="{{ route('akun.pegawai.edit', $data->nik) }}"
                                                    class="btn btn-primary mr-2"><i class="fa fa-pencil-square-o"
                                                        aria-hidden="true"></i></a>
                                                <form action="{{ route('akun.pegawai.destroy', $data->nik) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-primary"
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
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Akun Pegawai</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('akun.pegawai.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input
                                    class="form-control @error('nik')
                                {{ 'is-invalid' }}
                                @enderror"
                                    list="list" type="number" name="nik" id="nik" value="{{ old('nik') }}">
                                <datalist id="list">
                                    @foreach ($list as $list)
                                        <option value="{{ $list->nik }}">{{ $list->nama }}</option>
                                    @endforeach
                                </datalist>
                                @error('nik')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    class="form-control @error('email')
                                {{ 'is-invalid' }}
                                @enderror"
                                    type="email" name="email" id="email" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="password">Password</label>
                                        <input
                                            class="form-control @error('password')
                                        {{ 'is-invalid' }}
                                        @enderror"
                                            type="password" name="password" id="password">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="konfirmasi_password">Konfirmasi Password</label>
                                        <input
                                            class="form-control @error('konfirmasi_password')
                                            {{ 'is-invalid' }}
                                            @enderror"
                                            type="password" name="konfirmasi_password" id="konfirmasi_password">
                                        @error('konfirmasi_password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="role" id="role">
                                    <option @if (old('role') == 'Admin') {{ 'selected' }} @endif value="Admin">
                                        Admin
                                    </option>
                                    <option @if (old('role') == 'Owner') {{ 'selected' }} @endif value="Owner">
                                        Owner
                                    </option>
                                    <option @if (old('role') == 'Pegawai') {{ 'selected' }} @endif value="Pegawai">
                                        Pegawai
                                    </option>
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
