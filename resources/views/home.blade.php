@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">
                                Dashboard
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

@section('header')
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
    <!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <!--/.row-->
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-6 col-lg-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h5>Data Kategori</h5>

                        <span class="info-box-number">
                            <h3><b>{{ DB::table('kategoris')->count() }}</b></h3>
                        </span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-book"></i>
                    </div>
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ route('kategori.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="small-box bg-pink">
                    <div class="inner">
                        <h5>Data Satuan</h5>

                        <span class="info-box-number">
                            <h3><b>{{ DB::table('satuans')->count() }}</b></h3>
                        </span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-book"></i>
                    </div>
                    @if (Auth::user()->hasRole('admin'))
                    <a href="{{ route('satuan.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h5>Data Barang</h5>

                        <span class="info-box-number">
                            <h3><b>{{ DB::table('barangs')->count() }}</b></h3>
                        </span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-book"></i>
                    </div>
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ route('barang.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h5>Data Pelanggan</h5>

                        <span class="info-box-number">
                            <h3><b>{{ DB::table('orders')->count() }}</b></h3>
                        </span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-user"></i>
                    </div>
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ route('order.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h5>Management User</h5>

                        <span class="info-box-number">
                            <h3><b>{{ DB::table('users')->count() }}</b></h3>
                        </span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-users"></i>
                    </div>
                    @if (Auth::user()->hasRole('admin'))
                    <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>


        @endsection

    @stop

    @section('css')

    @stop
    @section('js')
    @stop
