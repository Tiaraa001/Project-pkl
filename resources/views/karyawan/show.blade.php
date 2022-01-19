@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Karyawan</div>
                    <div class="card-body">
                        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for=""> Nama Karyawan</label>
                                <input type="text" name="nama" value="{{ $karyawan->nama }}"
                                    class="form-control @error('nama') is-invalid @enderror" disabled>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" value="{{ $karyawan->alamat }}"
                                    class="form-control @error('alamat') is-invalid @enderror" disabled>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> Nik</label>
                                <input type="text" name="nik" value="{{ $karyawan->nik }}"
                                    class="form-control @error('nik') is-invalid @enderror" disabled>
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for=""> NO. Telp</label>
                                <input type="text" name="no_telp" value="{{ $karyawan->no_telp }}"
                                    class="form-control @error('no_telp') is-invalid @enderror" disabled>
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <a href="{{ route('karyawan.index') }}" class="btn btn-block btn-primary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
