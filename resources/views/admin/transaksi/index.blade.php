@extends('adminlte::page')

@section('title', 'Transaksi')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Data Transaksi
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
                        Data Transaksi
                        @if (Auth::user()->hasRole('kasir'))
                            <a href="{{ route('transaksi.create') }}"
                                class="btn btn-outline btn-sm btn btn-primary float-right">Tambah Transaksi</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="transaksi">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pesanan</th>
                                        <th>Total Bayar</th>
                                        <th>Uang Pembayaran</th>
                                        <th>Kembalian</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($transaksi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>POAA{{ $data->kodepesanan->kode_pesanan }}</td>
                                            <td>{{ number_format($data->total_bayar, 2) }}</td>
                                            <td>{{ number_format($data->uang, 2) }}</td>
                                            <td>{{ number_format($data->kembalian, 2) }}</td>
                                            <td>{{ $data->tanggal_transaksi }}</td>

                                            <td>

                                                <form action="{{ route('transaksi.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('transaksi.edit', $data->id) }}"
                                                        class="btn btn-outline btn-sm btn btn-warning">Edit</a>
                                                    <a href="{{ route('transaksi.show', $data->id) }}"
                                                        class="btn btn-outline btn-sm btn btn-info">Show</a>
                                                    <button type="submit" class="btn btn-outline btn-sm btn btn-danger"
                                                        onclick="return confirm('Apakah anda yakin akan menghapus?');">Delete</button>
                                                </form>
                                                {{-- <form action="{{ route('transaksi.destroy', $data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    {{-- <a href="{{ route('struk') }}"
                                                        class="btn btn-outline btn-sm btn btn-info">Cetak</a> --}}
                                                    {{-- <a href="{{ route('transaksi.show', $data->id) }}"
                                                        class="btn btn-outline btn-sm btn btn-info">Show</a>

                                                </form> --}}
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
            $('#transaksi').DataTable();
        });
    </script>
@endsection
