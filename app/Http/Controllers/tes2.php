<?php

namespace App\Http\Controllers;

use App\Models\simulasi;
use Illuminate\Http\Request;

class tes2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('simulasi.simulasi.tes2');
    }
}
