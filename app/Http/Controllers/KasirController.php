<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class KasirController extends Controller
{
    public function kasir()
    {
        return view('pos.kasir');
    }
}