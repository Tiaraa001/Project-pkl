@extends('adminlte::page')

@section('title', 'Pesanan')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Data Pesanan
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

@section('content')
    @include('layouts._flash')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Pesanan
                        @if (Auth::user()->hasRole('kasir'))
                            <a href="{{ route('order.create') }}"
                                class="btn btn-outline btn-sm btn btn-primary float-right">Tambah Pesanan</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="order">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pesanan</th>
                                        <th>Nama Pemesan</th>
                                        <th>Barang</th>
                                        <th>Harga(Rp)</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Pesanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($order as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->kodepesanan->kode_pesanan }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->barangs->nama_barang }}</td>
                                            <td>{{ number_format($data->barangs->harga, 2) }}</td>
                                            <td>{{ $data->jumlah }}</td>
                                            <td>{{ $data->tanggal }}</td>

                                            <td>
                                                <form action="{{ route('order.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('order.edit', $data->id) }}"
                                                        class="btn btn-outline btn-sm btn btn-warning">Edit</a>

                                                    <button type="submit" class="btn btn-outline btn-sm btn btn-danger"
                                                        onclick="return confirm('Apakah anda yakin akan menghapus?');">Delete</button>
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
            $('#order').DataTable();
        });
    </script>
@endsection
