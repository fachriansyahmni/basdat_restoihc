<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $Menus = Menu::get();

        $compacts = ['Menus'];
        return view('menu.menu', compact($compacts));
    }

    public function newMenu(Request $request)
    {
        $request->validate([
            'namaMenu' => 'required',
            'harga' => 'required',
        ]);

        $newMenu = new Menu([
            'namaMenu' => $request->namaMenu,
            'harga' => $request->harga
        ]);
        $save = $newMenu->save();

        if ($save) return redirect()->back();
        return redirect()->back();
    }
    public function editMenu(Request $request, $idMenu)
    {
        $request->validate([
            'namaMenu' => 'required',
            'harga' => 'required',
        ]);

        $Menu = Menu::findOrFail($idMenu);
        $Menu->namaMenu = $request->namaMenu;
        $Menu->harga = $request->harga;
        $save = $Menu->save();
        if ($save) return redirect()->back();
        return redirect()->back();
    }

    public function hapusMenu(Request $request, $idMenu)
    {
        $Menu = Menu::findOrFail($idMenu);
        $save = $Menu->delete();
        if ($save) return redirect()->back();
        return redirect()->back();
    }
}
