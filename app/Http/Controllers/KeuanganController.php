<?php

namespace App\Http\Controllers;
use App\Models\Pengeluaran;
use App\Models\Transaksi;

class KeuanganController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:keungan-list|pengeluaran-create|pengeluaran-edit|pengeluaran-delete', ['only' => ['index', 'store']]);
    //     $this->middleware('permission:pengeluaran-create', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:pengeluaran-edit', ['only' => ['edit', 'update']]);
    //     $this->middleware('permission:pengeluaran-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $transaksis = Transaksi::get();
        $pengeluarans = Pengeluaran::get();
        return view('admin.keuangan.index', compact('transaksis', 'pengeluarans'));
    }

}
