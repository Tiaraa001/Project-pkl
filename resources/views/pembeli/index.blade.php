@extends('layouts.admin')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Data Pembeli</h1>
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

                        <a href="{{ route('pembeli.create') }}" class="btn btn-sm btn-primary float-right">Tambah
                            Data Pembelian</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Pembeli</th>
                                    <th>Alamat</th>
                                    <th>Usia</th>
                                    <th>Aksi</th>

                                </tr>
                                @php $no=1; @endphp
                                @foreach ($pembeli as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_pembeli }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->usia }}</td>
                                        <td>
                                            <form action="{{ route('pembeli.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('pembeli.edit', $data->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ route('pembeli.show', $data->id) }}"
                                                    class="btn btn-warning">Show</a>
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah anda yakin menghapus ini?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
