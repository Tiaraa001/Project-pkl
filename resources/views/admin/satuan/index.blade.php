@extends('adminlte::page')

@section('title', 'Data Barang')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Satuan Barang</h1>
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
                    Data Satuan
                    <a href="{{ route('satuan.create') }}" class="btn btn-outline btn-sm btn btn-primary float-right">Tambah Satuan</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="menu">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Satuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach ($satuan as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->nama_satuan }}</td>
                                    <td>
                                        <form action="{{ route('satuan.destroy', $data->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('satuan.edit', $data->id) }}" class="btn btn-outline btn-sm btn btn-warning">Edit</a>

                                            <button type="submit" class="btn btn-outline btn-sm btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus?');">Delete</button>
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

