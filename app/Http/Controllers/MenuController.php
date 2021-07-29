<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\MenuExport;
use App\Imports\MenuImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Menu;
use App\MenuKategori;

class MenuController extends Controller
{
    public function index(Request $request, Menu $Menus)
    {
        $Menus = Menu::get();
        $MenuKategories = MenuKategori::get();
        if ($request->has('nama') || $request->has('kategori')) {
            $Menus = Menu::where('namaMenu', 'LIKE', '%' . $request->nama . '%');
            if ($request->kategori != 0) $Menus->where('menu_kategori_id', $request->kategori);
            $Menus = $Menus->get();
        }
        $compacts = ['Menus', 'MenuKategories'];
        return view('menu.menu', compact($compacts));
    }

    public function newMenu(Request $request)
    {
        $request->validate([
            'namaMenu' => 'required|min:0|max:191',
            'harga' => 'required|min:0',
        ]);

        $newMenu = new Menu([
            'namaMenu' => $request->namaMenu,
            'harga' => $request->harga
        ]);
        if ($request->has('kategori')) $newMenu->menu_kategori_id = $request->kategori;
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
        if ($request->has('kategori')) $Menu->menu_kategori_id = $request->kategori;
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

    public function export()
    {
        return Excel::download(new MenuExport, 'menu.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new MenuImport, $request->file('excel'));

        return redirect()->back();
    }
}
