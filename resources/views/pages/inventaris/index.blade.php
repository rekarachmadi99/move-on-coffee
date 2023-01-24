@extends('layouts.dataTables')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
        <p class="mb-4">Halaman ini menampilkan data inventaris pada Move On Coffee.</p>
        @if (!Session::get('errors'))
            @include('partials.session_alerts')
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah_barang">
                        <i class="fa fa-plus"></i>
                        Tambah Barang
                    </button>
                </div>
            </div>

            {{-- Modal-Tambah Barang --}}
            <div class="modal fade bd-example-modal-lg" id="tambah_barang" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Barang</label>
                                    <input type="text" class="form-control @error('nama') {{ 'is-invalid' }} @enderror"
                                        name="nama" id="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input type="number"
                                                class="form-control @error('quantity') {{ 'is-invalid' }} @enderror"
                                                name="quantity" id="quantity" value="{{ old('quantity') }}">
                                            @error('quantity')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="harga_satuan">Harga Satuan</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                </div>
                                                <input type="number"
                                                    class="form-control @error('harga_satuan') {{ 'is-invalid' }} @enderror"
                                                    name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan') }}">
                                            </div>
                                            @error('harga_satuan')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_kategori">Kategori Barang</label>
                                    <select class="form-control" name="id_kategori" id="id_kategori">
                                        @foreach ($list_kategori as $list_kategori)
                                            <option @if (old('id_kategori') == $list_kategori->id_kategori) {{ 'selected' }} @endif
                                                value="{{ $list_kategori->id_kategori }}">
                                                {{ $list_kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="foto_barang">Foto Barang</label>
                                    <input type="file"
                                        class="form-control @error('foto_barang') {{ 'is-invalid' }} @enderror"
                                        name="foto_barang" id="foto_barang">
                                    @error('foto_barang')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="Simpan">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width='2%'>ID</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Qty</th>
                                <th>Harga Satuan</th>
                                <th>Harga Total</th>
                                <th>Jenis Barang</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width='2%'>ID</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Qty</th>
                                <th>Harga Satuan</th>
                                <th>Harga Total</th>
                                <th>Jenis Barang</th>
                                <th>Option</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php
                                $id = 1;
                            @endphp
                            @foreach ($barang as $barang)
                                <tr>
                                    <td>{{ $id }}</td>
                                    <td><img src="{{ Storage::url('public/img/') . $barang->foto_barang }}"
                                            alt="{{ $barang->foto_barang }}" width="100px">
                                    </td>
                                    <td>{{ $barang->nama }}</td>
                                    <td>{{ $barang->quantity }}</td>
                                    <td>{{ $barang->harga_satuan }}</td>
                                    <td>{{ $barang->quantity * $barang->harga_satuan }}</td>
                                    <td>{{ $barang->nama_kategori }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('barang.edit', $barang->id_barang) }}"
                                                class="btn btn-primary mr-2"><i class="fa fa-pencil-square-o"
                                                    aria-hidden="true"></i></a>
                                            <form action="{{ route('barang.destroy', $barang->id_barang) }}"
                                                method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger"
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
@endsection
