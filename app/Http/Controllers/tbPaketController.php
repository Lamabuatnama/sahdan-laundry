<?php

namespace App\Http\Controllers;

use App\Exports\PaketExport;
use App\Imports\PaketImport;
use App\Models\tb_outlet;
use App\Models\tb_paket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function excelExport()
        {
            return Excel::download(new PaketExport, 'paket.xlsx');
            return redirect('/paket')->with('success', 'Data Berhasil DiExport');
        }


        public function excelImport(Request $request)
        {
            $validated = $request->validate([
                'file' => 'required|mimes:csv,xls,xlsx'
            ]);

            if (!$validated) {
                return back()->withErrors(['file','Belum Terisi']);
            }

                 // menangkap file excel
                 $file = $request->file('file');
                 Excel::import(new PaketImport, $file);

        return redirect('/paket')->with('success', 'Data Berhasil DiImport');
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
