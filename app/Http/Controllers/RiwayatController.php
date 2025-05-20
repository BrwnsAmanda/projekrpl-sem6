<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
{
    // return view('riwayat', [...]);
    return view('landing.riwayat'); // atau nama blade yang sesuai
}
}
