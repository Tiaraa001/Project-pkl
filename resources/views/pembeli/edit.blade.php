@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pembeli</div>
                    <div class="card-body">
                        <form action="{{ route('pembeli.update', $pembeli->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Masukan Nama Pembeli</label>
                                <input type="text" name="nama_pembeli" value="{{ $pembeli->nama_pembeli }}"
                                    class="form-control @error('nama_pembeli') is-invalid @enderror">
                                @error('nama_pembeli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Masukan Alamat</label>
                                <input type="text" name="alamat" value="{{ $pembeli->alamat }}"
                                    class="form-control @error('alamat') is-invalid @enderror">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Masukan Usia</label>
                                <input type="text" name="usia" value="{{ $pembeli->usia }}"
                                    class="form-control @error('usia') is-invalid @enderror">
                                @error('usia')
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
