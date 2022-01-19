<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('karyawan.create');

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

            'nama' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'no_telp' => 'required',
        ]);

        $karyawan = new Karyawan;

        $karyawan->nama = $request->nama;
        $karyawan->alamat = $request->alamat;
        $karyawan->nik = $request->nik;
        $karyawan->no_telp = $request->no_telp;

        $karyawan->save();
        return redirect()->route('karyawan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.show', compact('karyawan'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([

            'nama' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
            'no_telp' => 'required',
        ]);

        $karyawan = new Karyawan;

        $karyawan->nama = $request->nama;
        $karyawan->alamat = $request->alamat;
        $karyawan->nik = $request->nik;
        $karyawan->no_telp = $request->no_telp;

        $karyawan->save();
        return redirect()->route('karyawan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $karyawan = karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->route('karyawan.index');

    }
}
