@extends('adminlte::page')

@section('title', 'Data Pemasukan')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pemasukan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Data Pemasukan
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Pemasukan
                        {{-- <a href="{{ route('menu.create') }}"
                            class="btn btn-outline btn-sm btn btn-primary float-right">Tambah Masakan</a> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Total Pembelian</th>
                                        <th>Tanggal Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($transaksis as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->orders->barangs->nama_barang }}</td>
                                            <td>{{ $data->orders->nama }}</td>
                                            <td>{{ number_format($data->total_bayar, 2) }}</td>
                                            <td>{{ $data->tanggal_transaksi }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#menu').DataTable();
        });
    </script>
@endsection
