<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class HomeController extends Controller
{
    public function index()
    {
        //menghitung jumlah barang keseluruhan dalam database
        $barang = Barang::count();
        return view('dashboard.home', compact('barang'));
    }
}