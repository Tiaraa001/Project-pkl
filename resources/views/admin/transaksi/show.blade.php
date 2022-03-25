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
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Show Data Transaksi</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Kode Pesanan</label>
                            <input type="text" name="order_id" value="POAA{{ $transaksi->orders->kode_pesanan }}"
                                class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pelanggan</label>
                            <input type="text" name="nama" class="form-control" value="{{ $transaksi->orders->nama }}"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Total Bayar</label>
                            <input type="text" name="total_bayar" value="{{ $transaksi->total_bayar }}"
                                class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Uang Pembayaran</label>
                            <input type="text" name="uang" value="{{ $transaksi->uang }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Kembalian</label>
                            <input type="text" name="kembalian" value="{{ $transaksi->kembalian }}" class="form-control"
                                disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Transaksi</label>
                            <input type="date" name="tanggal_transaksi" value="{{ $transaksi->tanggal_transaksi }}"
                                class="form-control" disabled>
                        </div>

                        {{-- <div class="form-group">
                                <label for=""> Book Cover</label>
                                <br>
                                <img src="{{ $book->image() }}" style="width:350px; height:350px; padding:10px;" />
                            </div> --}}
                        <div class="form-group">
                            <br>
                            <a href="{{ url('admin/transaksi') }}" class="btn btn-block btn-primary">Kembali</a>
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
