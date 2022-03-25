@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Edit Data Transaksi
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
                    <div class="card-header">Edit transaksi</div>
                    <div class="card-body">
                        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">order_id</label>
                                <select name="order_id" class="form-control">
                                    @foreach ($order as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $transaksi->order_id ? 'selected="selected"' : '' }}>
                                            {{ $data->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Customer_id</label>
                                <select name="customer_id" class="form-control">
                                    @foreach ($customer as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $transaksi->customer_id ? 'selected="selected"' : '' }}>
                                            {{ $data->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="text" name="jumlah" value="{{ $transaksi->jumlah }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="harga" value="{{ $transaksi->harga }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Kembalian</label>
                                <input type="text" name="kembalian" value="{{ $transaksi->kembalian }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <input type="text" name="status" value="{{ $transaksi->status }}" class="form-control">
                            </div>

                            {{-- <select name="author_id" class="form-control @error('author_id') is-invalis @enderror">
                                    <option value="">Pilih Penulis</option>
                                    @foreach ($author as $data)
                                        <option value="{{ $data->id }}"
                                        {{ $data->id == $book->author_id ? 'selected="selected"' : '' }}>
                                        {{$data->fullName()}}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}


                            {{-- <input type="number" name="amount"  value="{{ $book->amount }}"
                                    class="form-control @error('amount') is-invalid @enderror">
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}

                            {{-- <div class="form-group">
                                <label for=""> Book</label>
                                <br>
                                <img src="{{ $book->image() }}" height="75" style="padding:10px;" />
                                <input type="file" name="cover" value="{{ $book->cover }}" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <br>
                                <button type="reset" class="btn btn-outline btn-sm btn btn-warning">Reset</button>
                                <button type="submit" class="btn btn-outline btn-sm btn btn-danger">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')
@stop
