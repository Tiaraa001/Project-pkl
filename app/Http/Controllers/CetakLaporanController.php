<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order;
use App\Models\Transaksi;
use App\Models\Pengeluaran;

use Illuminate\Http\Request;

class CetakLaporanController extends Controller
{
    public function laporanKeluar()
    {
        $order = Order::all();
        $barang = Barang::all();
        return view('admin.laporan.form-cetak');
    }

    public function cetaklaporanKeluar(Request $request)
    {
        $start = $request->tanggalawal;
        $end = $request->tanggalakhir;

        if ($start < $end) {
            if ($request->pilih == 'transaksi') {
                $request = Transaksi::whereBetween('tanggal_transaksi', [$start, $end])->get();
                return view('admin.laporan.cetak-laporan', compact('request'));
             } else if ($request->pilih == 'pemasukan') {
                $request = Transaksi::whereBetween('tanggal_transaksi', [$start, $end])->get();
                return view('admin.laporan.pemasukan', compact('request'));
            } else {
                $request = Pengeluaran::whereBetween('tanggal_pengeluaran', [$start, $end])->get();
                return view('admin.laporan.pengeluaran', compact('request'));
            }
        } else {
            return redirect()->back()->with('gagal', 'Tanggal tidak valid');
        }
    }
}
