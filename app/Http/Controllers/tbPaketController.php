<?php

namespace App\Http\Controllers;

use App\Models\tb_outlet;
use App\Models\tb_paket;
use Illuminate\Http\Request;

class tbPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket  = tb_paket::where('id_outlet',auth()->user()->id_outlet)->get();
        $outlet  = tb_outlet::all();
        return view('CRUD.paket.index', compact(
            'paket','outlet'
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
        $validated = $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required'
        ]);
        $create = tb_paket::create($validated);
        if($create)  return redirect('paket')->with('success', 'Data Sudah Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_paket  $tb_paket
     * @return \Illuminate\Http\Response
     */
    public function show(tb_paket $tb_paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_paket  $tb_paket
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_paket $tb_paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_paket  $tb_paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_paket $tb_paket, $id)
    {
        $validated = $request->validate([
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required'
        ]);
        $update = $tb_paket->find($id)->update($validated);
    if($update)  return redirect('paket')->with('success', 'Data Sudah Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_paket  $tb_paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_paket $tb_paket,$id)
    {
        $tb_paket->find($id)->delete();
     return redirect('paket')->with('success', 'Data Sudah Dihapus');

    }
}
 