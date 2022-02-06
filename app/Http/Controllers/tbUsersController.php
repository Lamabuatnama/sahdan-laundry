<?php

namespace App\Http\Controllers;

use App\Models\tb_outlet;
use App\Models\tb_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class tbUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = tb_users::all();
        $outlet = tb_outlet::all();
        return view('CRUD.users.index', compact('users','outlet'));
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
            'email' => 'required|email',
            'password' => 'required',
            'id_outlet' => 'required',
            'role' => 'required'

        ]);
        $validated['password']=Hash::make($validated['password']);

        $create = tb_users::create($validated);
        if($create)  return redirect('/')->with('success', 'Data Sudah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tb_users  $tb_users
     * @return \Illuminate\Http\Response
     */
    public function show(tb_users $tb_users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tb_users  $tb_users
     * @return \Illuminate\Http\Response
     */
    public function edit(tb_users $tb_users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tb_users  $tb_users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tb_users $tb_users, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'id_outlet' => 'required',
            'role' => 'required',

        ]);

        if($request->password != '' ){
            $validated['password']=hash::make($request->password);
        }
        $update = $tb_users->find($id)->update($validated);
        if($update)  return redirect('users')->with('success', 'Data Sudah Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tb_users  $tb_users
     * @return \Illuminate\Http\Response
     */
    public function destroy(tb_users $tb_users,$id)
    {
        $tb_users->find($id)->delete();
     return redirect('users')->with('success', 'Data Sudah Dihapus');
    }
}
