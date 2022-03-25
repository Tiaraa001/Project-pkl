@extends('adminlte::page')

@section('title', 'Data Barang')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kategori Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Data Kategori Barang
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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Data Kategori</div>
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Kategori</label>
                                <input type="text" name="nama_kategori" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-outline btn-sm btn btn-warning">Reset</button>
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
