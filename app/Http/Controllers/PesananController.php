<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pesanan;

class PesananController extends Controller
{
    public function index()
    {
        return view('/pesanan/index');
    }

    public function create()
    {
        return view('/pesanan/form');
    }

    public function save(Request $request)
    {
        $pesanan = new Pesanan();
        $pesanan->receiptid = $request->id;
        $pesanan->idPesanan = $request->idPesanan;
        $pesanan->jmlMenu = $request->noMeja;
        $pesanan->noMeja = $request->noMeja;
        $pesanan->idMenu = $request->idMenu;
        $pesanan->save();
        return redirect('/pesanan');
    }
}
