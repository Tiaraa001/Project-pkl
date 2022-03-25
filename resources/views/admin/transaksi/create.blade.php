@extends('adminlte::page')

@section('title', 'Transaksi')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Data Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Tambah Data Transaksi
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
                    <div class="card-header">Tambah Data Transaksi</div>
                    <div class="card-body">
                        <form action="{{ route('transaksi.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Kode Pesanan</label>
                                <select name="kodepesanan_id" class="form-control">
                                    @foreach ($kode as $data)
                                        <option value="{{ $data->id }}">Kode Order : {{ $data->kode_pesanan }}, Nama Pelanggang : {{ $data->order[0]->nama ?? '' }} Total Harga : {{ number_format($data->total, 2) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Uang Pembayaran</label>
                                <input type="text" name="uang" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Tanggal Transaksi</label>
                                <input type="date" name="tanggal_transaksi" class="form-control">
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
@section('js')
@endsection
