<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\CabangExport;
use App\Imports\CabangImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Cabang;

class CabangController extends Controller
{
    public function index()
    {
        $cabang = Cabang::get();
        return view('/cabang/index', compact('cabang'));
    }

    public function create()
    {
        return view('/cabang/form');
    }

    public function save(Request $request)
    {
        $request->validate([
            'idCabang' => 'required|unique:cabang',
            'alamat' => 'min:1|max:65535',
            'noHp' => 'min:1|max:191',
        ]);

        $cabang = new Cabang();
        $cabang->idCabang = $request->idCabang;
        $cabang->alamat = $request->alamat;
        $cabang->noHp = $request->noHp;
        $cabang->save();
        return redirect()->route('cabang');
    }

    public function edit($id)
    {
        $cabang = Cabang::find($id);
        return view('/cabang/edit', compact('cabang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'min:1|required',
            'noHp' => 'min:1|required',
        ]);

        $cabang = Cabang::find($id);
        $cabang->alamat = $request->alamat;
        $cabang->noHp = $request->noHp;
        $cabang->save();
        return redirect()->route('cabang');
    }

    public function delete($id)
    {
        $cabang = Cabang::find($id);
        $cabang->delete();
        return redirect('/cabang');
    }

    public function export()
    {
        return Excel::download(new CabangExport, 'cabang.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new CabangImport, $request->file('excel'));

        return redirect()->back();
    }
}
