<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\order;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obat = Obat::all();
        return view('obat.index', compact('obat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('obat.create');

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
        $validated = $request->validate([

            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
        ]);

        $obat = new Obat;
        $obat->kode = $request->kode;
        $obat->nama = $request->nama;
        $obat->harga = $request->harga;
        $obat->stok = $request->stok;
        $obat->satuan = $request->satuan;

        $obat->save();
        return redirect()->route('obat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $obat = Obat::findOrFail($id);
        return view('obat.show', compact('obat'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // validasi data
        $validated = $request->validate([

            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',

        ]);

        $obat = Obat::findOrFail($id);

        $obat->kode = $request->kode;
        $obat->nama = $request->nama;
        $obat->harga = $request->harga;
        $obat->stok = $request->stok;
        $obat->satuan = $request->satuan;

        $obat->save();
        return redirect()->route('obat.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obat = Obat::findOrFail($id);
        $obat->delete();
        return redirect()->route('obat.index');

    }
}
