@extends('layouts.main')
@section('konten')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Supplier</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li>
                        <a href="{{route('supplier.index')}}">Data Supplier</a>
                    </li>
                    <li class="active">Tambah Supplier</li>
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
    <form class="needs-validation" method="post" action="{{route('supplier.store')}}" validate>
        @csrf
        <div class="card">
            <div class="card-header">
                <strong>Form</strong> Barang Baru
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-supplier" class=" form-control-label">Supplier</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-kode" name="supplier"
                                placeholder="Masukan Jenis Supplier" class="form-control" value="{{ old('supplier') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-nama" class=" form-control-label">Nama Supplier</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-nama" name="nama"
                                placeholder="Masukan Nama Supplier" class="form-control" value="{{ old('nama') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-jenis" class=" form-control-label">Alamat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-alamat" name="alamat" placeholder="Masukan Alamat"
                                class="form-control" value="{{old('alamat')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-no_telp" class=" form-control-label">No HP</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-no_telp" name="no_telp"
                                placeholder="Masukan No HP" class="form-control" value="{{old('no_telp')}}">
                        </div>
                    </div>
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