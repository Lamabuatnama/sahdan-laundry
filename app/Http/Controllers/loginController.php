<?php

namespace App\Http\Controllers;

use App\Models\tb_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{

    /**
     * Menentukan Tampilan
     */
    public function showloginForm()
    {
        return view('login.index');

    }

    /**
     * Mengecek Email & Password dan Membuat session
     */

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($request->only(['email', 'password']), $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect()->back()->withInput()->withErrors([
            'email' => 'Email atau password salah'
        ]);


    }

    /**
     * Untuk Menghapus Users Yang Sedang Login
     */
    public function logout(Request $request)
    {

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }



}
