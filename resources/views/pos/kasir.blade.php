@extends('layouts.main')
@section('konten')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Point Of Sale</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Kasir</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4" style="margin-top: 15px;">
    <div class="card">
        <div class="card-header" style="background-color: #8080ff;">
            <i class="fa fa-search" style="color: white;"></i>
            <font style="color: white;"><strong>Cari</strong> Barang<font>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-11">
                        <input type="text" id="exampleInputName2" placeholder="Masukan : Kode/Nama Barang" required=""
                            class="form-control">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-8" style="margin-top: 15px;">
    <div class="card">
        <div class="card-header" style="background-color: #8080ff;">
            <i class="fa fa-bars"></i>
            <font style="color: white;"><strong>Hasil</strong> Pencarian<font>
        </div>
        <div class="card-body card-block">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection