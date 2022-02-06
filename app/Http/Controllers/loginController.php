<?php

namespace App\Http\Controllers;

use App\Models\tb_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function showloginForm()
    {
        return view('login.index');

    }

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

    public function chec(Request $request)
    {

        $data = auth()->user();


        return dd($data);
    }
    public function logout(Request $request)
    {

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }



}
