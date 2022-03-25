<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Order;
use App\Models\KodePesanan;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('admin.order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        return view('admin.order.create', compact('barang'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $kodepesanan = new KodePesanan;
        $kodepesanan->kode_pesanan = mt_rand(100, 999);
        $kodepesanan->save();

        foreach ($request->addmore as $value) {
           
            $order = Order::insert([
                'kodepesanan_id' => $kodepesanan->id,
                'nama' => $request->nama,
                'barang_id' => $value['barang_id'],
                'jumlah' => $value['jumlah'],
                'tanggal' =>$request->tanggal,

            ]);
            $barang = Barang::findOrFail($value['barang_id']);
            $barang->stok -= $value['jumlah'];
            $barang->save();

        }

        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan Pesanan",
        ]);

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::all();
        $order = Order::findOrFail($id);
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit Pesanan",
        ]);

        return view('admin.order.edit', compact('order', 'barang'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validated = $request->validate([
        //     'nama' => 'required',
        //     'kode_pesanan' => 'required',
        //     'barang_id' => 'required',
        //     'tanggal' => 'required',
        //     'jumlah' => 'required',
        //     'status' => 'required',
        // ]);

        $order = Order::findOrFail($id);
        $order->kode_pesanan = mt_rand(10000, 99999);
        $order->nama = $request->nama;
        $order->barang_id = $request->barang_id;
        $order->tanggal = $request->tanggal;
        $order->jumlah = $request->jumlah;
        $order->save();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Mengedit Pesanan",
        ]);

        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menghapus Pesanan",
        ]);

        return redirect()->route('order.index');

    }
}
