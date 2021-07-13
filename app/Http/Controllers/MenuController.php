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
}
