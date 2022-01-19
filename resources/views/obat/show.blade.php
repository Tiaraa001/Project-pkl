@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Obat</div>
                    <div class="card-body">
                        <form action="{{ route('obat.update', $obat->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for=""> Kode Obat</label>
                                <input type="text" name="kode" value="{{ $obat->kode }}"
                                    class="form-control @error('kode') is-invalid @enderror" disabled>
                                @error('kode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           <div class="form-group">
                                <label for=""> Nama Obat </label>
                                <input type="text" name="nama" value="{{ $obat->nama }}"
                                    class="form-control @error('nama') is-invalid @enderror" disabled>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> Harga</label>
                                <input type="text" name="harga" value="{{ $obat->harga }}"
                                    class="form-control @error('harga') is-invalid @enderror" disabled>
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> stok</label>
                                <input type="text" name="stok" value="{{ $obat->stok }}"
                                    class="form-control @error('stok') is-invalid @enderror" disabled>
                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> Satuan</label>
                                <input type="text" name="satuan" value="{{ $obat->satuan }}"
                                    class="form-control @error('satuan') is-invalid @enderror" disabled>
                                @error('satuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <a href="{{ route('obat.index') }}" class="btn btn-block btn-primary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
