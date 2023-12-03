<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barangs = barang::all();
        return view('barang.databarang', compact('barangs'));
    }

    public function search(Request $request)
    {
        $kategori = $request->input('kategori');

        if ($kategori) {
            $barangs = Barang::where('kategori', $kategori)->get();

            return view('barang.search_results', compact('barangs'));
        } else {
            // Handle if category is empty (e.g., show all items)
            $barangs = Barang::all();

            return view('barang.search_results', compact('barangs'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.tambahbarang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menghitung sisa barang
        $stok_barang = $request->input('stok_barang');
        $masuk = $request->input('masuk');
        $keluar = $request->input('keluar');
        $sisa = $stok_barang + $masuk - $keluar;
        
        $this->validate($request, [
            'kategori' => 'required',
            'nama_barang' => 'required',
            'stok_barang' => 'required',
            'masuk' => 'required',
            'keluar' => 'required',
            'satuan' => 'required',
        ], [
            'kategori.required' => 'Kategori tidak boleh kosong',
            'nama_barang.required' => 'Nama Barang tidak boleh kosong',
            'stok_barang.required' => 'Stok Barang tidak boleh kosong',
            'masuk.required' => 'Barang masuk Barang tidak boleh kosong',
            'keluar.required' => 'Barang keluar tidak boleh kosong',
            'satuan.required' => 'Satuan tidak boleh kosong',
        ]);
        $barangs = Barang::create([
            'kategori' => $request->kategori,
            'nama_barang' => $request->nama_barang,
            'stok_barang' => $request->stok_barang,
            'masuk' => $request->masuk,
            'keluar' => $request->keluar,
            'sisa' => $sisa,
            'satuan' => $request->satuan,
        ]);
        if ($barangs) {
            return redirect()->route('barang.index')->with(['success' => 'Data Barang Berhasil Ditambahkan']);
        } else {
            return redirect()->route('barang.index')->with(['erorr' => 'Data Barang Gagal Ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $barangs = Barang::find($id);
        return view('barang.editbarang', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {     
        $stok_barang = $request->input('stok_barang');
        $masuk = $request->input('masuk');
        $keluar = $request->input('keluar');
        $sisa = $stok_barang + $masuk - $keluar;
        $this->validate($request, [
            'kategori' => 'required',
            'satuan' => 'required|min:0',
        ], [
            'satuan.required' => 'Satuan tidak boleh kosong',
            'stok.min' => 'Stok harus lebih besar atau sama dengan 0',
        ]);
        $barangs = barang::find($id);
        $barangs->kategori = $request->kategori;
        $barangs->nama_barang = $request->nama_barang;
        $barangs->stok_barang = $request->stok_barang;
        $barangs->masuk = $request->masuk;
        $barangs->keluar = $request->keluar;
        $barangs->sisa = $sisa;
        $barangs->satuan = $request->satuan;
        $barangs->save();

        $updatedBarang = Barang::find($id);
        if ($barangs) {
            return redirect()->route('barang.index')->with(['success' => 'Data Berhasil Diubah']);
        } else {
            return redirect()->route('barang.index')->with(['erorr' => 'Data Gagal Diubah']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return response()->json(['status' => 'Data Berhasil di hapus!']);
    }
}