<?php

namespace App\Http\Controllers;

use App\Models\obat;
use Illuminate\Http\Request;

class ApiObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = obat::all();
        return response()->json([

	'status' => true,
	'code' => 200,
	'message' => 'berhasil',
	'data' => $obat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obat = new Obat();
        $obat->kode = $request->kode;
        $obat->nama = $request->nama;
        $obat->harga = $request->harga;
        $obat->stok = $request->stok;
        $obat->satuan = $request->satuan;

        $obat->save();
        return response()->json([
            'success' =>true,
            'message' => 'data obat berhasil dibuat',
            'data'=> $user,
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obat = Obat::find($id);
        if ($obat) {
            return response()->json([
                'success' => true,
                'message' => 'Show Data User',
                'data' => $obat,
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak di temukan',
                'data' => [],
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obat = Obat::find($id);
        if ($obat) {
            return response()->json([
                'success' => true,
                'message' => 'Data obat Berhasil dibuat',
                'data' => $obat,
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Data obat gagal',
                'data' => [],
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::find($id);
        if ($obat) {
            $obat ->delete();
            return response()->json([
                'success' => true,
                'message' => 'data obat berhasil dihapus',
                'data' => $obat,
            ], 200);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Data obat tidak di temukan',
                'data' => [],
            ], 404);
        }
    }
    }
