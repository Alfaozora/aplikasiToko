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
        //menghitung total barang
        $totalStok = Barang::sum('stok');
        $totalHarga = Barang::sum('harga');
        $totalHargaJual = Barang::sum('harga_jual');
        $totalProfit = Barang::sum('profit');

        $cari = $request->cari;
        $barangs = Barang::where('kode', 'LIKE', "%" . $cari . "%")
            ->orWhere('nama_barang', 'LIKE', "%" . $cari . "%")
            ->orWhere('jenis_barang', 'LIKE', "%" . $cari . "%")
            ->orderBy('id', 'asc')->paginate(20);
        return view('barang.databarang', compact('barangs', 'totalStok', 'totalHarga', 'totalHargaJual', 'totalProfit'));
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
        $harga = $request->harga;
        $harga_jual = $request->harga_jual;
        $profit = $harga_jual - $harga;
        $totalProfit = $profit * $request->stok;
        $this->validate($request, [
            'kode' => 'required|unique:barangs|max:13',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'harga_jual' => 'required',
        ], [
            'kode.required' => 'Nama tidak boleh kosong',
            'kode.unique' => 'Kode sudah terdaftar',
            'nama_barang.required' => 'Nama Barang tidak boleh kosong',
            'jenis_barang.required' => 'Jenis Barang tidak boleh kosong',
            'harga.required' => 'Harga Barang tidak boleh kosong',
            'stok.required' => 'Stok tidak boleh kosong',
            'satuan.required' => 'Satuan tidak boleh kosong',
            'harga_jual.required' => 'Harga Jual tidak boleh kosong',
        ]);
        $barangs = Barang::create([
            'kode' => $request->kode,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
            'harga_jual' => $request->harga_jual,
            'profit' => $totalProfit,
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
        $harga = $request->harga;
        $harga_jual = $request->harga_jual;
        $profit = $harga_jual - $harga;
        $totalProfit = $profit * $request->stok;
        $this->validate($request, [
            'satuan' => 'required|min:0',
        ], [
            'satuan.required' => 'Satuan tidak boleh kosong',
            'stok.min' => 'Stok harus lebih besar atau sama dengan 0',
        ]);
        $barangs = barang::find($id);
        $barangs->kode = $request->kode;
        $barangs->nama_barang = $request->nama_barang;
        $barangs->jenis_barang = $request->jenis_barang;
        $barangs->harga = $request->harga;
        $barangs->stok = $request->stok;
        $barangs->satuan = $request->satuan;
        $barangs->harga_jual = $request->harga_jual;
        $barangs->profit = $totalProfit;
        $barangs->save();
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