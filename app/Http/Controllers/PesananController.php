<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pesanan;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::get();
        return view('/pesanan/index', compact('pesanan'));
    }

    public function create()
    {
        return view('/pesanan/form');
    }

    public function save(Request $request)
    {
        $pesanan = new Pesanan();
        $pesanan->receiptid = $request->receiptid;
        $pesanan->jmlMenu = $request->jmlMenu;
        $pesanan->noMeja = $request->noMeja;
        $pesanan->idMenu = $request->idMenu;
        $pesanan->save();
        return redirect('/pesanan');
    }

    public function edit($id)
    {
        $pesanan = Pesanan::find($id);
        return view('/pesanan/edit', compact('pesanan'));
    }

    public function update(Request $request, $id)
    {

        $pesanan = Pesanan::find($id);
        $pesanan->receiptid = $request->receiptid;
        $pesanan->jmlMenu = $request->jmlMenu;
        $pesanan->noMeja = $request->noMeja;
        $pesanan->idMenu = $request->idMenu;
        $pesanan->save();
        return redirect('/pesanan');
    }

    public function delete($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
        return redirect('/pesanan');
    }
}
