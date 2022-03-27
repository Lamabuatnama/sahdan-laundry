<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Menampilkan View
 */
class Simulasi_Gaji_Controller extends Controller
{
    function index(){
        return view('simulasi.gaji.index');
    }
}
