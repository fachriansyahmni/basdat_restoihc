<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Menu;

class MenuController extends Controller
{
    public function index()
    {
        return view('/menu/menu');
    }
}
