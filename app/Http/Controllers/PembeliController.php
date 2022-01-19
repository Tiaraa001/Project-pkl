<?php

namespace App\Http\Controllers;

use App\Models\pembeli;
use auth;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembeli = pembeli::all();
        return view('pembeli.index', compact('pembeli'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pembeli.create');

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

            'nama_pembeli' => 'required',
            'alamat' => 'required',
            'usia' => 'required',
        ]);

        $pembeli = new Pembeli;
        $pembeli->nama_pembeli = $request->nama_pembeli;
        $pembeli->alamat = $request->alamat;
        $pembeli->usia = $request->usia;

        $pembeli->save();
        return redirect()->route('pembeli.index');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function show(pembeli $id)
    {
        //
        // $pembeli = Pembeli::all();

        // $pembeli = Pembeli::where('id', $id)->first();
        // return view('transaksi', compact('pembeli', $pembeli));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function edit(pembeli $id)
    {
        //
        $pembeli = Pembeli::findOrFail($id);
        return view('pembeli.edit', compact('pembeli'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pembeli $id)
    {
        //
        // $validated = $request->validate([

        //     'nama_pembeli' => 'required',
        //     'alamat' => 'required',
        //     'usia' => 'required',
        // ]);

        // $transaksi = new Transaksi();
        // $transaksi->id_pembeli = $request->id;
        // $transaksi->total_harga = 0;
        // $transaksi->save();

        // $idObat = $request->id_obat;
        // $jumlahObat = $request->jumlah_obat;

        // foreach ($request->transaksi as $key => $value) {
        //     $obat = Obat::where('id', $idObat[$key])->first();

        //     $order = new Order();
        //     $order->id_karyawan = Auth::user()->id;
        //     $order->id_obat = $idObat[$key];
        //     $order->jumlah_obat = $jumlahObat[$key];
        //     $order->total_harga = $obat->harga * $request->transaksi[0][jumlah_obat];
        //     $order->save();
        // }

        // $totalHarga = Transaksi::where('id', $transaksi->id)->where('id_pembeli', $transaksi->id_pembeli)->first();
        // $order = Oder::where('id_transaksi', $totalHarga->id)->sum('total_harga');
        // $totalHarga->total_harga = $order;
        // $totalHarga->save();
        // return redirect()->route('pembeli.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembeli $id)
    {
        //
        $pembeli = Pembeli::findOrFail($id);
        $pembeli->delete();
        return redirect()->route('pembeli.index');

    }
}
