<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pesanan;

class PesananController extends Controller
{
    public function index()
    {
        return view('pesanan.index');
    }
}
