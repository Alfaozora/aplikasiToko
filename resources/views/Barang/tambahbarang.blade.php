@extends('layouts.main')
@section('konten')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Barang</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>
                        <a href="{{route('barang.index')}}">Data Barang</a>
                    </li>
                    <li class="active">Tambah Barang</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12" style="margin-top: 15px;">
    {{-- Menampilkan erorr validasi--}}
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="needs-validation" method="post" action="{{route('barang.store')}}" validate>
        @csrf
        <div class="card">
            <div class="card-header">
                <strong>Form</strong> Barang Baru
            </div>
            <div class="card-body card-block">
                <form action="{{route('barang.store')}}" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-nama" class=" form-control-label">Kode Barang</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-kode" name="kode"
                                placeholder="Masukan Kode Barang" class="form-control" value="{{ old('kode') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-nama_barang" class=" form-control-label">Nama
                                Barang</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-nama_barang" name="nama_barang"
                                placeholder="Masukan Nama Barang" class="form-control" value="{{ old('nama_barang') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-jenis" class=" form-control-label">Jenis Barang</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-jenis_barang" name="jenis_barang"
                                placeholder="Masukan Jenis Barang" class="form-control" value="{{old('jenis_barang')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-harga" class=" form-control-label">Harga</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-harga" name="harga"
                                placeholder="Masukan Harga" class="form-control" value="{{old('harga')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-stok" class=" form-control-label">Stok</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-stok" name="stok"
                                placeholder="Masukan Banyaknya Stok" class="form-control" value="{{old('stok')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Satuan</label></div>
                        <div class="col-12 col-md-9">
                            <select name="satuan" id="satuan" class="form-control">
                                <option value="">Silahkan Pilih</option>
                                <option value="pcs">Pcs</option>
                                <option value="box">Box</option>
                                <option value="lusin">Lusin</option>
                                <option value="kodi">Kodi</option>
                                <option value="gross">Gross</option>
                                <option value="rim">Rim</option>
                                <option value="meter">Meter</option>
                                <option value="batang">Batang</option>
                                <option value="buah">Buah</option>
                                <option value="lembar">Lembar</option>
                                <option value="liter">Liter</option>
                                <option value="botol">Botol</option>
                                <option value="kotak">Kotak</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-harga_jual" class="form-control-label">Harga
                                Jual</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-harga_jual" name="harga_jual"
                                placeholder="Masukan Harga Jual" class="form-control" value="{{old('harga_jual')}}">
                        </div>
                    </div>
                    <!-- <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-profit" class=" form-control-label">Profit</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-profit" name="profit"
                                class="form-control" disabled="">
                        </div>
                    </div> -->
                </form>
            </div>
            <div class="card-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection