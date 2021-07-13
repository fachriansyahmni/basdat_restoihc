<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

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
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->jabatan = $request->jabatan;
        $user->save();
        return redirect('/user');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('/user/edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->jabatan = $request->jabatan;
        $user->save();
        return redirect('/user');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/user');
    }
}
