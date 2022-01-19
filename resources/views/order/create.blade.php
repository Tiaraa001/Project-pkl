@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Order</div>
                    <div class="card-body">
                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <!-- <div class="form-group">
                                <label for="">Masukan Id Transaksi</label>
                                <input type="text" name="id_transaksi"
                                    class="form-control @error('id_transaksi') is-invalid @enderror">
                                @error('id_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> -->
                            <div class="form-group">
                            <label for="">Nama Karyawan</label>
                            <select name="id_karyawan" class="form-control @error('id_karyawan') is-invalid @enderror" >
                                @foreach($karyawan as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @error('id_obat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group">
                            <label for="">Nama Obat</label>
                            <select name="id_obat" class="form-control @error('id_obat') is-invalid @enderror" >
                                @foreach($obat as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @error('id_obat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Harga Obat</label>
                            <select name="id_obat" class="form-control @error('id_obat') is-invalid @enderror" >
                                @foreach($obat as $data)
                                    <option value="{{$data->id}}">{{$data->harga}}</option>
                                @endforeach
                            </select>
                            @error('id_obat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label for="">Masukan Jumlah Obat</label>
                                <input type="number" name="jumlah_obat" class="form-control @error('jumlah_obat') is-invalid @enderror">
                                @error('jumlah_obat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="">Total Harga</label>
                                <input type="number" name="total_harga" class="form-control @error('total_harga') is-invalid @enderror">
                                @error('total_harga')
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
