<?php

namespace App\Http\Controllers;

use App\Models\tb_member;
use Illuminate\Http\Request;

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
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tlp' => 'required'
        ]);
        $create = tb_member::create($validated);
        if($create)  return redirect('member')->with('success', 'Data Sudah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function show(tb_member $tb_member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_member $tb_member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_member $tb_member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_member  $tb_member
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_member $tb_member)
    {
        //
    }
}
