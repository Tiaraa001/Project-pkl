@extends('adminlte::page')

@section('title', 'Keuangan')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Management Keuangan</h1>
                </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h5>Pemasukan</h5>

                        <span class="info-box-number">
                            <h3><b>{{ number_format($transaksis->sum('total_bayar'), 2, ',', ',') }}</b></h3>
                        </span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-coins"></i>
                    </div>
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ route('pemasukan.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h5>Pengeluaran</h5>

                        <span class="info-box-number">
                            <h3><b>{{ number_format($pengeluarans->sum('jumlah_pengeluaran'), 2, ',', ',') }}</b></h3>
                        </span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-coins"></i>
                    </div>
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ route('pengeluaran.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h5>Keuntungan</h5>

                        <span class="info-box-number">
                            <h3><b>Rp. @php
                                $total = $transaksis->sum('total_bayar') - $pengeluarans->sum('jumlah_pengeluaran');
                            @endphp
                                    {{ number_format($total, 2, ',', ',') }}</b></h3>
                        </span>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-book"></i>

                    </div>
                    @if (Auth::user()->hasRole('admin'))
                    <a href="{{ route('pengeluaran.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                @endif
                </div>

                </div>
            </div>
        </div>
    </div>
@endsection
