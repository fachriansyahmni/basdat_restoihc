<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use Session;

class UserController extends Controller
{
    public function index()
    {
        $user = User::get();
        return view('/user/index', compact('user'));
    }

    public function create()
    {
        return view('/user/form');
    }

    public function save(Request $request)
    {

        $request->validate([
            'name' => 'required|min:5|max:16',
            'username' => 'required|unique:users',
            'password' => 'required|min:8|max:16',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->jabatan = $request->jabatan;
        $user->save();

        if($user->save()){
            return redirect('/user')->with(Session::flash('sukses', 'Berhasil menambah data'));
        }else
            return redirect('/user/form')->with(Session::flash('gagal', 'gagal menambah data'));
        

        
    }

    public function edit($id)
    {

        $user = User::find($id);
        return view('/user/edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->jabatan = $request->jabatan;
        $user->save();

        Session::flash('sukses', 'Data berhasil di update!');

        return redirect('/user');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        Session::flash('sukses', 'Berhasil menghapus data');
        return redirect('/user');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'user.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new UsersImport, $request->file('excel'));

        return redirect()->back();
    }
}
