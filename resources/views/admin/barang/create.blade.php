@extends('adminlte::page')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Barang</div>
                    <div class="card-body">
                        <form action="{{ route('barang.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" >
                                @foreach($kategori as $data)
                                    <option value="{{$data->id}}">{{$data->nama_kategori}}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                            <label for="">Nama Satuan</label>
                            <select name="id_satuan" class="form-control @error('id_satuan') is-invalid @enderror" >
                                @foreach($satuan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_satuan}}</option>
                                @endforeach
                            </select>
                            @error('id_satuan')
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
                                <label for="">Masukan Stok</label>
                                <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror">
                                @error('stok')
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

@section('css')

@endsection

@section('js')

@endsection
