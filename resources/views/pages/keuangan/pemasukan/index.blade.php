@extends('layouts.datatables')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Laporan Pemasukan</h1>
        <p class="mb-4">Halaman ini menampilkan laporan pemasukan Move On Coffee.</p>
        @if (!Session::get('errors'))
            @include('partials.session_alerts')
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Pemasukan</h6>
                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah_barang">
                        <i class="fa fa-plus"></i>
                        Tambah Barang
                    </button>
                </div>
            </div>



            <div class="card-body">
                <form action="{{ route('pemasukan.store') }}" method="post">
                    @csrf
                    <input type="text" class="form-control" name="reportrange" />
                    <input type="submit" value="Cari">
                </form>


                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width='2%'>No</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                                <th>Nota Transaksi</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th width='2%'>No</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                                <th>Nota Transaksi</th>
                                <th>Option</th>
                            </tr>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
