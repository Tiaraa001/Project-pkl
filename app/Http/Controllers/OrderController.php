<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\obat;
use App\Models\karyawan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $order = order::with('obat','karyawan')->get();;
        return view('order.index', compact('order'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       $obat = obat::all();
       $karyawan = karyawan::all();
        return view('order.create', compact('obat','karyawan'));
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            // 'id_transaksi' => 'required',
            'id_karyawan' => 'required',
            'id_obat' => 'required',
            'jumlah_obat' => 'required',
            'total_harga' => 'required',

        ]);

        $order = new Order;
        // $order->id_transaksi = $request->id_transaksi;
        $order->id_karyawan = $request->id_karyawan;
        $order->id_obat = $request->id_obat;
        $order->jumlah_obat = $request->jumlah_obat;
        $order->total_harga = $request->total_harga;

        $order->save();
        return redirect()->route('order.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $order = Order::findOrFail($id);
        return view('order.edit', compact('order'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $id)
    {
        //
        $validated = $request->validate([

            'jumlah_obat' => 'required',
            'total_harga' => 'required',

        ]);

        $order = new Order;
        $order->jumlah_obat = $request->jumlah_obat;
        $order->total_harga = $request->total_harga;

        $order->save();
        return redirect()->route('order.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $id)
    {
        //
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('order.index');

    }
}
