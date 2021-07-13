<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $cabang = new Cabang();
        $cabang->alamat = $request->alamat;
        $cabang->noHp = $request->noHp;
        $cabang->save();
        return redirect('/cabang');
    }

    public function edit($id)
    {
        $cabang = Cabang::find($id)->first();
        return view('/cabang/edit', compact('cabang'));
    }

    public function update(Request $request, $id)
    {
        $cabang = Cabang::find($id);
        $cabang->alamat = $request->alamat;
        $cabang->noHp = $request->noHp;
        $cabang->save();
        return redirect('/cabang');
    }

    public function delete($id)
    {
        $cabang = Cabang::find($id);
        $cabang->delete();
        return redirect('/cabang');
    }
}
