@extends('adminlte::page')

@section('title', 'Pesanan')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Data Pesanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Edit Data Pesanan
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
                    <div class="card-header">Edit order</div>
                    <div class="card-body">
                        <form action="{{ route('order.update', $order->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="">Nama Pelanggan</label>
                                <input type="text" name="nama" value="{{ $order->nama }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Menu</label>
                                <select name="menu_id" class="form-control">
                                    @foreach ($menu as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $order->menu_id ? 'selected="selected"' : '' }}>
                                            {{ $data->nama_menu }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" name="jumlah" value="{{ $order->jumlah }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Tanggal Pesanan</label>
                                <input type="date" name="tanggal" value="{{ $order->tanggal }}" class="form-control">
                            </div>

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
