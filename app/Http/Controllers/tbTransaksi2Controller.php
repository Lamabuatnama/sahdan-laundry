<?php

namespace App\Http\Controllers;

use App\Models\tb_member;
use App\Models\tb_paket;
use App\Models\tb_transaksi;
use App\Models\tb_detail_transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use TbTransaksi;

class tbTransaksi2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $paket          = tb_paket::where('id',auth()->user()->id_outlet)->get();
        $member         = tb_member::all();
        $transaksi      = tb_transaksi::where('id_outlet',auth()->user()->id_outlet)->get();
        return view('transaksi2.index', compact(
            'member','paket','transaksi'
        ));

    }
    public function cetak_pdf($id)
    {
    	$transaksi = tb_transaksi::where('id',$id)->get();
    	$pdf = PDF::loadview('transaksi2.faktur',['transaksi'=>$transaksi]);
    	return $pdf->stream();
    }

    private function generateKodeInvoice(){
        $last   = tb_transaksi::orderBy('id','desc')->first();
        $last   = ($last == null?1:$last->id + 1);
        $kode   = sprintf('TKI'.date('Ymd').'%06d',$last);
        return $kode;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['id_outlet']       = auth()->user()->id_outlet;
        $request['kode_invoice']    = $this->generateKodeInvoice();
        $request['tgl_bayar']       = ($request->bayar== 0?NULL:date('Y-m-d H:i:s'));
        $request['status']          = 'baru';
        $request['dibayar']         = ($request->bayar==0?'belum_dibayar':'dibayar');
        $request['id_user']         = auth()->user()->id;

        // input transaksi
        $input_transaksi            = tb_transaksi::create($request->all());
        if($input_transaksi == null){
            return back()->withErrors([
                'transaksi'=>'input transaksi gagal'
            ]);
        }

        // input detail pembelian
        foreach($request->id_paket as $i => $v){
            $input_detail = tb_detail_transaksi::create([
                'id_transaksi'  => $input_transaksi->id,
                'id_paket'      => $request->id_paket[$i],
                'qty'           => $request->qty[$i],
                'keterangan'    => ''
            ]);
        }
        return redirect('transaksi2')->with('success','input berhasil');
    }
}
