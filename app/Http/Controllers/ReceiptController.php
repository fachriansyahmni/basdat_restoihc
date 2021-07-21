<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Receipt;

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

    public function update(Request $request, $idReceipt)
    {
        $Receipt = Receipt::find($idReceipt);
        $Receipt->nama_pelanggan = $request->nama_pelanggan;
        $totalHarga = 0;
        $deleteRPesanan = Pesanan::where('receiptid', $Receipt->id)->delete();
        foreach ($request->idMenu as $index => $ipesanan) {
            // $Pesanan = Pesanan::find($ipesanan);
            // $Pesanan->jmlMenu = $request->jmlMenu[$index];
            // $Pesanan->noMeja = $request->noMeja;
            // $Pesanan->save();

            $pesanan = new Pesanan();
            $pesanan->receiptid = $Receipt->id;
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
}
