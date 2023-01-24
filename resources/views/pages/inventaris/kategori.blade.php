@extends('layouts.dataTables')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Kategori Barang</h1>
        <p class="mb-4">Halaman ini menampilkan kategori barang.</p>
        @if (!Session::get('errors'))
            @include('partials.session_alerts')
        @endif
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kategori Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width='2%'>No</th>
                                        <th>Kategori Barang</th>
                                        <th>Create At</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th width='2%'>No</th>
                                        <th>Kategori Barang</th>
                                        <th>Create At</th>
                                        <th>Option</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @php
                                        $id = 1;
                                    @endphp
                                    @foreach ($kategori as $kategori)
                                        <tr>
                                            <td>{{ $id++ }}</td>
                                            <td>{{ $kategori->nama }}</td>
                                            <td>{{ $kategori->created_at }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <form action="{{ route('kategori.destroy', $kategori->id_kategori) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-primary"
                                                            onclick="return confirm('Anda yakin ingin menghapus record ini?')"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                </div>
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
                        <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Kategori Barang</label>
                                <input type="text"
                                    class="form-control @error('kategori_barang'){{ 'is-invalid' }}@enderror"
                                    name="kategori_barang" id="kategori_barang">
                                @error('kategori_barang')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <input type="submit" class="btn btn-primary btn-block" value="Simpan">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
