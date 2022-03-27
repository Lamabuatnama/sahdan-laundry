<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\databarang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class Simulasi_databarang_Controller extends Controller
{

    /**
     * Menentukan Tampilan
     */

    function index(){
        $databarang = databarang::all();
        return view('simulasi.databarang.index', compact(
            'databarang'
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
            'qty' => 'required',
            'harga' => 'required',
            'wb' => 'required',
            'supplier' => 'required',
            'status' => 'required',
            'wu'=> 'required',
        ]);
        // dd($validated);

        $insert = databarang::create($validated);
        if ($insert)  return redirect('/databarang')->with('success','Data Berhasil DiTambahkan');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\databarang  $databarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, databarang $db, $id)
    {
        dd($request);
        $validated = $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'tlp' => 'required'
                 ]);
        $update = $db->find($id)->update($validated);
        if($update)  return redirect('databarang')->with('success', 'Data Sudah Diupdate');

    }


    // Update Status Ketika Status DiUbah
    public function status(request $request ){
        $data = databarang::where('id',$request->id)->first();
        $data->status   = $request->status;
        $data->wu       = $request->wu;

        $update = $data->save();

        return 'Data Gagal Ditarik';
    }


    // /**
    //  * Mendownload PDF
    //  */

    // public function cetak_pdf(){
    // 	$penjemputan = databarang::all();
    // 	$pdf = pdf::download('penjemputan.faktur',['penjemputan'=>$penjemputan]);
    // 	return $pdf->stream();
    // }

    // /**
    //  *
    //  */
    // public function excelExport(){
    //     return Excel::download(new PenjemputanExport, 'PenjemputanLaundry.xlsx');
    //     return redirect('/penjemputan')->with('success','Data Berhasil DiExport');
    // }

    // /**
    //  * Download excel template.
    //  *
    //  * @return \Illuminate\Support\Facades\Storage
    //  */

    // public function templateImport(){
    //     return response()->download(storage_path('app\public\templates\Import_penjemputan.xlsx'));
    //     // return Storage::download('templates/Import_penjemputan.xlsx');
    // }


    // public function excelImport(request $request){
    //     $validated  = $request->validate([
    //         'file'  => 'required|mimes:csv,xls,xlsx'
    //     ]);
    //     if(!$validated){
    //         return back()->withErrors(['file','Belum Diisi']);
    //     }

    //         $file = $request->file('file');
    //         Excel::import(new PenjemputanImport, $file);

    //         return redirect('penjemputan')->with('success', ' Data Berhasil DiImport');
    // }





     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\databarang  $databarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(databarang $db,$id)
    {
        $db->find($id)->delete();
     return redirect('/databarang')->with('success', 'Data Sudah Dihapus');
    }
}
