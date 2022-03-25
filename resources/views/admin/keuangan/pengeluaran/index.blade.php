@extends('adminlte::page')

@section('title', 'Data Pengeluaran')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pengeluaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Data Pengeluaran
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
                        Data Pengeluaran
                        <a href="{{ route('pengeluaran.create') }}"
                            class="btn btn-outline btn-sm btn btn-primary float-right">Tambah Pengeluaran</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nominal Pengeluaran</th>
                                        <th>Detail Pengeluaran</th>
                                        <th>Tanggal Pengeluaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengeluarans as $index => $pengeluaran)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $pengeluaran->user->name }}</td>
                                            <td>{{ number_format($pengeluaran->jumlah_pengeluaran, 2) }}</td>
                                            <td>{{ $pengeluaran->deskripsi }}</td>
                                            <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
                                            <td>
                                                <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}"
                                                    method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('pengeluaran.edit', $pengeluaran->id) }}"
                                                        class="btn btn-outline btn-sm btn btn-warning"><i
                                                            class="fas fa-edit"></i></a>

                                                    <button type="submit" class="btn btn-outline btn-sm btn btn-danger"
                                                        onclick="return confirm('Are you sure?');"><i
                                                            class="fas fa-trash"></i></button>
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
            $('#menu').DataTable();
        });
    </script>
@endsection
