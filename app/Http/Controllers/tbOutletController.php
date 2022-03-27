<?php

namespace App\Http\Controllers;

use App\Models\tb_outlet;
use Illuminate\Http\Request;

class tbOutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet  = tb_outlet::all();
        return view('CRUD.Outlet.index', compact(
            'outlet'
        ));
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
            'nama' => 'required',
            'alamat' => 'required',
            'tlp' => 'required'
        ]);
        $create = tb_outlet::create($validated);
        if($create)  return redirect('outlet')->with('success', 'Data Sudah Ditambahkan');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_outlet  $tb_outlet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_outlet $tb_outlet, $id)
    {
        $validated = $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'tlp' => 'required'
                 ]);
        $update = $tb_outlet->find($id)->update($validated);
        if($update)  return redirect('outlet')->with('success', 'Data Sudah Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_outlet  $tb_outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_outlet $tb_outlet,$id)
    {
        $tb_outlet->find($id)->delete();
     return redirect('outlet')->with('success', 'Data Sudah Dihapus');

    }
}
