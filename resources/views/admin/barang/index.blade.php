@extends('adminlte::page')

@section('title', 'Data Barang')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Data Barang Apotek</h1>
        </div>
       
</div>
@endsection

@section('content')
@include('layouts._flash')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Barang Apotek
                    <a href="{{ route('barang.create') }}" class="btn btn-outline btn-sm btn btn-primary float-right">Tambah Barang</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="menu">
                            <thead>
                                <tr>

                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Kategori</th>
                                    <th class="text-center">Nama Barang</th>
                                    <th class="text-center">Satuan</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Aksi</th>


                                </tr>
                            </thead>

                            <tbody>
                                @php $no=1 @endphp
                                <!-- data -->
                                @foreach ($barang as $data)
                                <tr>
                                    <td class="text-center">{{$no++}}</td>
                                    <td class="text-center">{{$data->kategori->nama_kategori}}</td>
                                    <td class="text-center">{{$data->nama_barang}}</td>
                                    <td class="text-center">{{$data->satuan->nama_satuan}}</td>
                                    <td class="text-center">{{$data->stok}}</td>
                                    <td>{{ number_format($data->harga, 2) }}</td>
                                    <td>
                                        <form class="text-center" action="{{ route('barang.destroy', $data->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('barang.edit', $data->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ route('barang.show', $data->id) }}" class="btn btn-warning">Show</a>
                                            <button type="submit" class="btn btn-danger delete-confirm">Delete</button>
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

