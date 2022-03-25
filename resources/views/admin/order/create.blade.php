@extends('adminlte::page')

@section('title', 'Pesanan')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Tambah Data Pesanan
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
                    <div class="card-header">Tambah Data Pesanan</div>
                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control">
                            </div>

                            <div class="form-group" id="tambah-data">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Barang</label>
                                        <select name="addmore[0][barang_id]" class="form-control">
                                            <option selected disabled>Pilih barang</option>
                                            @foreach ($barang as $data)
                                                <option value="{{ $data->id }}">{{ $data->nama_barang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Jumlah</label>
                                        <input type="number" name="addmore[0][jumlah]" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <button name="tambah" id="add" type="button" class="btn btn-success">Tambah</button>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">Tanggal Pesanan</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>

                            <div class="form-group">

                                <button type="reset" class="btn btn-outline btn-sm btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-outline btn-sm btn btn-danger">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
@endsection
@push('js')
    <script type="text/javascript">
        var i = 0;
        $("#add").click(function() {
            ++i;
            // $("#tambah-data").append('<tr><td><input type="text" name="addmore[' + i +
            //     '][barang_id]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore[' +
            //     i +
            //     '][jumlah]" placeholder="Enter your Qty" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
            // );
            $('#tambah-data').append('<div class="col-md-6">'+
                '<div class="form-group">'+
                    '<label for="">Barang</label>'+
                    '<select name="addmore[' + i +'][barang_id]" class="form-control">'+
                        '<option selected disabled>Pilih barang</option>'+
                        @foreach ($barang as $data)
                            '<option value="{{ $data->id }}">{{ $data->nama_barang }}</option>'+
                        @endforeach
                    '</select>'+
                '</div>'+
            '</div>'+
            '<div class="col-md-6">'+
                '<div class="form-group">'+
                    '<label for="">Jumlah</label>'+
                    '<input type="number" name="addmore[' + i +'][jumlah]" class="form-control">'+
                '</div>'+
            '</div>');

        });

        $(document).on('click', '.remove-tr', function() {

            $(this).parents('tr').remove();

        });
    </script>
@endpush
