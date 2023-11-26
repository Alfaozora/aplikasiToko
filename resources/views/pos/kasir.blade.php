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
<div class="col-lg-4">
    <div class="card">
        <div class="card-header">
            <strong>Cari</strong> Barang
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
@endsection