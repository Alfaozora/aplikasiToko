<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = supplier::all();
        return view('supplier.supplier', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.tambahsupplier');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'supplier' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required'
        ], [
            'supplier.required' => 'Supplier tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'no_telp.required' => 'No Telp tidak boleh kosong'
        ]);
        $suppliers = supplier::create([
            'supplier' => $request->supplier,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
        ]);
        if ($suppliers) {
            return redirect()->route('supplier.index')->with(['success' => 'Data Supplier Berhasil Ditambahkan!']);
        } else {
            return redirect()->route('supplier.index')->with(['error' => 'Data Supplier Gagal Ditambahkan!']);
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
        $suppliers = supplier::find($id);
        return view('supplier.editsupplier', compact('suppliers'));
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
        $suppliers = supplier::find($id);
        $suppliers->supplier = $request->supplier;
        $suppliers->nama = $request->nama;
        $suppliers->alamat = $request->alamat;
        $suppliers->no_telp = $request->no_telp;
        $suppliers->save();
        if ($suppliers) {
            return redirect()->route('supplier.index')->with(['success' => 'Data Supplier Berhasil Diubah!']);
        } else {
            return redirect()->route('supplier.index')->with(['error' => 'Data Supplier Gagal Diubah!']);
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
        $suppliers = supplier::find($id);
        $suppliers->delete();
        return response()->json([
            'status' => 'Data Berhasil Dihapus!'
        ]);
    }
}