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
                                <label for="">Masukan Kode Obat</label>
                                <input type="text" name="kode" value="{{ $obat->kode }}"
                                    class="form-control @error('kode') is-invalid @enderror">
                                @error('kode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Nama Obat</label>
                                <input type="text" name="nama" value="{{ $obat->nama }}"
                                    class="form-control @error('nama') is-invalid @enderror">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Harga</label>
                                <input type="text" name="harga" value="{{ $obat->harga }}"
                                    class="form-control @error('harga') is-invalid @enderror">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Stok</label>
                                <input type="text" name="stok" value="{{ $obat->stok }}"
                                    class="form-control @error('stok') is-invalid @enderror">
                                @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Satuan</label>
                                <input type="text" name="satuan" value="{{ $obat->satuan }}"
                                    class="form-control @error('satuan') is-invalid @enderror">
                                @error('satuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
