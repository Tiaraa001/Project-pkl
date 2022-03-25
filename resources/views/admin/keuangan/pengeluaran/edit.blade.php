@extends('adminlte::page')

@section('title', 'Edit Data Pengeluaran')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Pengeluaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Edit Data Pengeluaran
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
                    <div class="card-header">Edit Data Pengeluaran</div>
                    <div class="card-body">
                        <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="jumlah_pengeluaran" class="form-label">Nominal Pengeluaran</label>
                                <input type="number" name="jumlah_pengeluaran" id="jumlah_pengeluaran"
                                    class="form-control" value="{{ $pengeluaran->jumlah_pengeluaran }}">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi" class="form-label">Detail Pengeluaran</label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="form-control">{{ $pengeluaran->deskripsi }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Tanggal Pengeluaran</label>
                                <input type="date" name="tanggal_pengeluaran"
                                    value="{{ $pengeluaran->tanggal_pengeluaran }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline btn-sm btn btn-danger">Save</button>
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
