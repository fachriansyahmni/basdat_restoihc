<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Receipt;
use Barryvdh\DomPDF\Facade as PDF;;

class ReceiptController extends Controller
{
    public function index()
    {
        return view('receipt.index');
    }

    public function edit($idReceipt)
    {
        $Receipt = Receipt::find($idReceipt);
        $Menus = Menu::get();
        return view('receipt.edit', compact(['Receipt', 'Menus']));
    }

    public function update(Request $request, $receiptId)
    {
        $request->validate([
            'noMeja' => "required",
            'jmlBayar' => "required",
            'jmlMenu' => "required",
            'idMenu' => "required",
        ], [
            'noMeja.required' => 'No Meja tidak boleh kosong!'
        ]);
        $Receipt = Receipt::find($receiptId);
        $Receipt->nama_pelanggan = $request->nama_pelanggan;
        $totalHarga = 0;
        $deleteRPesanan = Pesanan::where('receiptid', $Receipt->receiptId)->delete();
        foreach ($request->idMenu as $index => $ipesanan) {
            // $Pesanan = Pesanan::find($ipesanan);
            // $Pesanan->jmlMenu = $request->jmlMenu[$index];
            // $Pesanan->noMeja = $request->noMeja;
            // $Pesanan->save();

            $pesanan = new Pesanan();
            $pesanan->receiptid = $Receipt->receiptId;
            $pesanan->jmlMenu = $request->jmlMenu[$index];
            $pesanan->noMeja = $request->noMeja;
            $pesanan->idMenu = $request->idMenu[$index];
            $pesanan->save();

            $totalHarga += $pesanan->d_menu->harga * $request->jmlMenu[$index];
        }
        $Receipt->totalHarga = $totalHarga;
        $Receipt->jmlBayar = $request->jmlBayar;
        $Receipt->save();
        return redirect()->route('pesanan');
    }

    public function delete($id)
    {
        $Receipt = Receipt::find($id);
        $Receipt->delete();
        return redirect()->back();
    }

    public function printLaporan()
    {
        $data["Receipts"] = Receipt::get();
        $pdf = PDF::loadView('receipt.pdf', $data);
        return $pdf->stream('invoice.pdf');
    }
}
