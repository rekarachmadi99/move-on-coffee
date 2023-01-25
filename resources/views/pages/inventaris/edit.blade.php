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
                <form action="{{ route('barang.update') }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="id_barang">ID Barang</label>
                        <input type="text" class="form-control" name="id_barang" id="id_barang"
                            value="{{ $barang->id_barang }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control @error('nama') {{ 'is-invalid' }} @enderror"
                            name="nama" id="nama" value="{{ $barang->nama }}">
                        @error('nama')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control @error('quantity') {{ 'is-invalid' }} @enderror"
                                    name="quantity" id="quantity" value="{{ $barang->quantity }}">
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
                                        name="harga_satuan" id="harga_satuan" value="{{ $barang->harga_satuan }}">
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
                                <option @if ($barang->id_kategori == $list_kategori->id_kategori) {{ 'selected' }} @endif
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
                        <input type="file" class="form-control" name="foto_barang" id="foto_barang">
                        <p>*Foto biarkan jika tidak akan di update</p>

                        <img class="img-thumbnail mt-2" width="100px"
                            src="{{ Storage::url('public/img/') . $barang->foto_barang }}"
                            alt="{{ $barang->foto_barang }}">
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection
