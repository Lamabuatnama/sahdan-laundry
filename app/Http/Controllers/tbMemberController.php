<?php

namespace App\Http\Controllers;

use App\Exports\MemberExport;
use App\Imports\MemberImport;
use App\Models\tb_member;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class tbMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member  = tb_member::all();
        return view('CRUD.member.index', compact(
            'member'
        ));
    }

        public function excelExport()
        {
            return Excel::download(new MemberExport, 'member.xlsx');
            return redirect('/member')->with('success', 'Data Berhasil DiExport');
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
                 Excel::import(new MemberImport, $file);

        return redirect('/member')->with('success', 'Data Berhasil DiImport');
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
            'jenis_kelamin' => 'required',
            'tlp' => 'required'
        ]);
        $create = tb_member::create($validated);
        if($create)  return redirect('member')->with('success', 'Data Sudah Ditambahkan');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_member $tb_member,$id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required'
        ]);
        $update = $tb_member->find($id)->update($validated);
         if($update)  return redirect('member')->with('success', 'Data Sudah Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_member $tb_member,$id)
    {
        $tb_member->find($id)->delete();
     return redirect('member')->with('success', 'Data Sudah Dihapus');
    }
}
