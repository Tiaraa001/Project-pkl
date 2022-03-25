<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::get();
        return view('admin.keuangan.pemasukan.index', compact('transaksis'));
    }

}
