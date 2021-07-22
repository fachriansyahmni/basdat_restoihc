<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pesanan;
use App\Receipt;
use Illuminate\Support\Facades\Auth;
use App\Exports\PesananExport;
use App\Imports\PesananImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class PesananController extends Controller
{
    public function index()
    {
        $Receipts = Receipt::orderBy('created_at', 'desc')->get();
        return view('/pesanan/index', compact('Receipts'));
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

    public function pesananBaru()
    {
        $Menus = Menu::get();

        $compacts = ['Menus'];
        return view('pesanan.pesanan-baru', compact($compacts));
    }

    public function submitPesananBaru(Request $request)
    {
        $request->validate([
            'namaPembeli' => 'required',
            'noMeja' => 'required',
            'jmlBayar' => 'required',
            'payload' => 'required',
        ]);

        $payloads = json_decode($request->payload);
        $totalHarga = 0;
        $receipt = new Receipt([
            'idCabang' => null,
            'idPegawai' => Auth::user()->id,
            'nama_pelanggan' => $request->namaPembeli,
            'totalHarga' => 0,
            'jmlBayar' => $request->jmlBayar,
            'tglPembelian' => date('Y-m-d H:i:s')
        ]);
        $svreceipt = $receipt->save();
        if ($svreceipt) {
            foreach ($payloads as $payload) {
                $MenuId = Menu::getIdMenuByName($payload->nm);
                $pesanan = new Pesanan([
                    'receiptid' => $receipt->id,
                    "jmlMenu" => $payload->qtymenu,
                    'noMeja' => $request->noMeja,
                    'idMenu' => $MenuId->id
                ]);
                $pesanan->save();
                $totalHarga += $payload->qtymenu * $MenuId->harga;
            }
            $receipt->totalHarga = $totalHarga;
            $receipt->save();
        }
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new PesananExport, 'pesanan.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new PesananImport, $request->file('excel'));

        return redirect()->back();
    }
}
