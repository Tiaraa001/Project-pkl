@extends('adminlte::page')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                </div>
            </div>
        </div>
    </div>

@endsection


@section('content')
<div class="row">

    <div class="col-sm-1"></div>
    <div class="card col-md-10">
        <h2 class="card-header">Edit Barang

        </h2>
        <div class="card-body">
            <div class="col-md-12">
                <form role="form" action="{{ route('barang.update', $barang->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <select name="kategori" class="form-control">
                            <option value="{{ $kategori->kategori }}">Data Obat</option>
                            <option value="{{ $kategori->kategori }}">Data Alat Kesehatan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Masukan Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror">
                        @error('nama_barang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama Satuan</label>
                        <select name="nama_satuan" class="form-control">
                            <option value="Kilogram">Kilo Gram</option>
                            <option value="Kaplet">Kaplet</option>
                            <option value="Pcs">Pcs</option>
                            <option value="Butir">Butir</option>
                        </select>
                    </div>

                     <div class="form-group">
                         <label for="">Masukan Stok</label>
                         <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror">
                         @error('stok')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                         @enderror
                     </div>

                    <div class="form-group">
                        <label for="">Masukan Harga</label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror">
                        @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <button class="btn btn-default" type="reset">Batal</button>
                    </div>
                </form>
            </div>
        </div>
@endsection

@section('css')

@endsection

@section('js')

@endsection
