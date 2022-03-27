<?php

namespace App\Http\Controllers;

use App\Exports\PenjemputanExport;
use App\Imports\PenjemputanImport;
use App\Models\penjemputan_laundry;
use App\Models\tb_member;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class Simulasi_Penjemputan_Controller extends Controller
{

    /**
     * Menentukan Tampilan
     */
    function index(){
        $penjemput = penjemputan_laundry::all();
        $member = tb_member::all();

        return view('simulasi.penjemputan.index',compact(
            'penjemput', 'member'
        ) );
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
            'petugas'=> 'required',
            'status'=> 'required',
            'id_member' =>'required'
        ]);
        // dd($validated);

        $insert = penjemputan_laundry::create($validated);
        if ($insert) {
            return redirect('/penjemputan')->with('success','Data Berhasil DiTambahkan');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penjemputan_laundry $penjemputan_laundry,$id)
    {
        $validated = $request->validate([
            'petugas'=> 'required',
            'status'=> 'required',
            'id_member' =>'required'

        ]);
        $update = $penjemputan_laundry->find($id)->update($validated);
         if($update)  return redirect('penjemputan')->with('success', 'Data Berhasil DiUpdate');

    }


    public function status(request $request ){
        $data = penjemputan_laundry::where('id',$request->id)->first();
        $data->status = $request->status;
        $update = $data->save();

        return 'Data Gagal Ditarik';
    }


    /**
     * Mendownload PDF
     */

    public function cetak_pdf(){
    	$penjemputan = penjemputan_laundry::all();
    	$pdf = pdf::download('penjemputan.faktur',['penjemputan'=>$penjemputan]);
    	return $pdf->stream();
    }

    /**
     *
     */
    public function excelExport(){
        return Excel::download(new PenjemputanExport, 'PenjemputanLaundry.xlsx');
        return redirect('/penjemputan')->with('success','Data Berhasil DiExport');
    }

    /**
     * Download excel template.
     *
     * @return \Illuminate\Support\Facades\Storage
     */

    public function templateImport(){
        return response()->download(storage_path('app\public\templates\Import_penjemputan.xlsx'));
        // return Storage::download('templates/Import_penjemputan.xlsx');
    }


    public function excelImport(request $request){
        $validated  = $request->validate([
            'file'  => 'required|mimes:csv,xls,xlsx'
        ]);
        if(!$validated){
            return back()->withErrors(['file','Belum Diisi']);
        }

            $file = $request->file('file');
            Excel::import(new PenjemputanImport, $file);

            return redirect('penjemputan')->with('success', ' Data Berhasil DiImport');
    }





     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penjemputan_laundry  $penjemputan_laundry
     * @return \Illuminate\Http\Response
     */
    public function destroy(penjemputan_laundry $penjemputan_laundry,$id)
    {
        $penjemputan_laundry->find($id)->delete();
     return redirect('/penjemputan')->with('success', 'Data Sudah Dihapus');
    }
}
