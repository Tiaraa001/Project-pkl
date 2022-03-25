<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::with('kategori', 'satuan')->get();
        return view('admin.barang.index', compact('barang'));
        return view("addMore");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $satuan = satuan::all();
        return view('admin.barang.create', compact('satuan', 'kategori'));

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

            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'id_satuan' => 'required',
            'stok' => 'required',
            'harga' => 'required',


        ]);

        $barang = new Barang;
        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        $barang->id_satuan = $request->id_satuan;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;


        $barang->save();
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        $satuan = Satuan::findOrFail($id);
        $barang = Barang::findOrFail($id);
        return view('barang.show', compact('barang', 'kategori', 'satuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::findOrFail($id);
        $satuan = Satuan::findOrFail($id);
        return view('barang.edit', compact('barang', 'kategori', 'satuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $id)
    {
        $validated = $request->validate([

            'id_kategori' => 'required',
            'nama_barang' => 'required',
            'id_satuan' => 'required',
            'stok' => 'required',
            'harga' => 'required',


        ]);

        $barang = Barang::findOrFail($id);
        $barang->id_kategori = $request->id_kategori;
        $barang->nama_barang = $request->nama_barang;
        $barang->id_satuan = $request->id_satuan;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;


        $barang->save();
        Alert::success('Success', 'Data Saved Successfully');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Barang::destroy($id)) {
            return redirect()->back();
        }
        // Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('barang.index');

        $barang->delete();
        return redirect()->route('barang.index');
    }
}
