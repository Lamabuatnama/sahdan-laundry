<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang_inventaris;

class barang_inventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang_inventaris::all();
        return  view('CRUD.Barang.index', compact(
            'barang'
        ));
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
        // dd($request);
        $validated = $request->validate([
                'nama_barang'       => 'required',
                'merk_barang'       => 'required',
                'qty'               => 'required',
                'kondisi'           => 'required',
                'tanggal_pengadaan' => 'required'
            ]);
        $create = barang_inventaris::create($validated);
        if($create) return redirect('/barang')->with('success','Data Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, barang_inventaris $barang_inventaris , $id)
    {
        $validated = $request->validate([
            'nama_barang'       => 'required',
            'merk_barang'       => 'required',
            'qty'               => 'required',
            'kondisi'           => 'required',
            'tanggal_pengadaan' => 'required'
        ]);
    $update = $barang_inventaris->find($id)->update($validated);
    if($update) return redirect('/barang')->with('success','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang_inventaris $barang_inventaris ,$id)
    {
        $barang_inventaris->find($id)->delete();
     return redirect('barang')->with('success', 'Berhasil Menghapus Data');
    }
}
