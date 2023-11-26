<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class KasirController extends Controller
{
    public function kasir(Request $request)
    {
        $search = $request->input('search');
        if($search){
            $barangs = barang::where('kode', 'like', "%$search%")
            ->orWhere('nama_barang', 'like', "%$search%")
            ->get();
            return view('pos.kasir', compact('barangs'));
        }else{
            return view('pos.kasir', ['barangs' => []]);
        }
        
        
    }
}