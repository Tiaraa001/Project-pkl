@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Barang</div>
                    <div class="card-body">
                        <form action="{{ route('barang.update', $barang->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for=""> Nama Kategori</label>
                                <input type="text" name="kategori" value="{{ $kategori->kategori }}"
                                    class="form-control @error('kategori') is-invalid @enderror" disabled>
                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> Nama Barang</label>
                                <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}"
                                    class="form-control @error('barang') is-invalid @enderror" disabled>
                                @error('barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> Nama Satuan</label>
                                <input type="text" name="satuan" value="{{ $satuan->nama_satuan }}"
                                    class="form-control @error('satuan') is-invalid @enderror" disabled>
                                @error('satuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> Stok</label>
                                <input type="text" name="stok" value="{{ $barang->stok }}"
                                    class="form-control @error('stok') is-invalid @enderror" disabled>
                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> Harga</label>
                                <input type="text" name="harga" value="{{ $barang->harga }}"
                                    class="form-control @error('harga') is-invalid @enderror" disabled>
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">

                                <a href="{{ route('barang.index') }}" class="btn btn-block btn-primary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
