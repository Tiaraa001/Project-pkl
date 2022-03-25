<?php

namespace App\Http\Controllers;

use App\Models\KodePesanan;
use App\Models\Order;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Session;
use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = transaksi::all();
        return view('admin.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = KodePesanan::where('status', 0)->whereHas('order')->get();
        $total = 0;
        foreach ($kode as $value) {
            foreach ($value->order as $data) {
                $total += $data->jumlah * $data->barangs->harga;
            }
            $value->total= $total;
        }
        // return $kode;
        return view('admin.transaksi.create', compact('kode'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kodepesanan_id' => 'required',
            'uang' => 'required',
        ]);

        $kode = KodePesanan::where('id', $request->kodepesanan_id)->whereHas('order')->get();
        $total = 0;
        foreach ($kode as $value) {
            foreach ($value->order as $data) {
                $total += $data->jumlah * $data->barangs->harga;
            }
            $value->total= $total;
        }

        $transaksi = new transaksi;
        $transaksi->kodepesanan_id = $request->kodepesanan_id;
        $transaksi->uang = $request->uang;
        $transaksi->tanggal_transaksi = $request->tanggal_transaksi;
        $transaksi->total_bayar = $total;
        $transaksi->kembalian = $transaksi->uang - $transaksi->total_bayar;
        if ($transaksi->uang < $transaksi->total_bayar) {
            Session::flash("flash_notification", [
                "level" => "danger",
                "message" => "Maaf Uang Anda Kurang",
            ]);
            return redirect()->route('transaksi.index');
        } else {
            $transaksi->save();
        }
        $order = KodePesanan::findOrFail($request->kodepesanan_id);
        $order->status = 1;
        $order->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menambah Transaksi",
        ]);

        return redirect()->route('transaksi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = transaksi::findOrFail($id);
        return view('admin.transaksi.show', compact('transaksi'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::all();
        $transaksi = transaksi::findOrFail($id);
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit Transaksi",
        ]);

        return view('admin.transaksi.edit', compact('transaksi', 'order'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'order_id' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
            'total_bayar' => 'required',
            'tanggal_transaksi' => 'required',
            // 'uang' => 'required',
            // 'kembalian' => 'required',
            'status' => 'required',

        ]);

        $transaksi = transaksi::findOrFail($id);
        $transaksi->order_id = $request->order_id;
        $transaksi->jumlah = $transaksi->orders->jumlah;
        $transaksi->harga = $request->orders->menus->harga;
        $transaksi->total_bayar = $transaksi->harga * $transaksi->jumlah;
        $transaksi->uang = $request->uang;
        $transaksi->tanggal_transaksi = $request->tanggal_transaksi;
        $transaksi->kembalian = $transaksi->uang - $transaksi->total_bayar;
        // $transaksi->status = $request->status;
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit Transaksi",
        ]);

        $transaksi->save();
        return redirect()->route('transaksi.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }

    public function struk()
    {
        $transaksi = Transaksi::with('orders')->get();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menghapus Transaksi",
        ]);

        return view('admin.transaksi.cetak-laporan', compact('transaksi'));
    }
}
