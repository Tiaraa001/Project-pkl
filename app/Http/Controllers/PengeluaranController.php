<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluarans = Pengeluaran::get();
        return view('admin.keuangan.pengeluaran.index', compact('pengeluarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.keuangan.pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengeluaran::create([
            'user_id' => Auth::user()->id,
            'deskripsi' => $request->deskripsi,
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
        ]);

        return redirect()->route('pengeluaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        return view('admin.keuangan.pengeluaran.edit', compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $pengeluaran->update([
            'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
            'deskripsi' => $request->deskripsi,
            'tanggal_pengeluaran' => $request->tanggal_pengeluaran,
        ]);
        return redirect()->route('pengeluaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index');
    }
}
