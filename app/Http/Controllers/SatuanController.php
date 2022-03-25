<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Session;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = Satuan::all();
return view('admin.satuan.index', compact('satuan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $satuan = Satuan::all();
return view('admin.satuan.create');

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
    'nama_satuan' => 'required',

]);

$satuan = new satuan;
//DB            CREATE
$satuan->nama_satuan = $request->nama_satuan;
$satuan->save();
Session::flash("flash_notification", [
    "level" => "success",
    "message" => "Berhasil Menyimpan Satuan Barang",
]);

return redirect()->route('satuan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
Session::flash("flash_notification", [
    "level" => "success",
    "message" => "Berhasil Mengedit Masakan",
]);
return view('admin.satuan.edit', compact('satuan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validated = $request->validate([
    'nama_satuan' => 'required',

]);
$satuan = Satuan::findOrFail($id);
$satuan->nama_satuan = $request->nama_satuan;

$satuan->save();
return redirect()->route('satuan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $satuan = Satuan::findOrFail($id);
$satuan->delete();
return redirect()->route('satuan.index');

    }
}
