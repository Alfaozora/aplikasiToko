@extends('layouts.main')
@section('konten')
@include('sweetalert::alert')
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
                    <li class="active">Data Barang</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12" style="margin-top: 15px;">
    @if ($message = Session::get('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        <span class="badge badge-pill badge-danger">Error</span>
        {{$message}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Barang</strong>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-primary" href="{{route('barang.create')}}"><i class="fa fa-plus"></i>&nbsp;
                Tambah Barang</a>
            <table class="table table-bordered" style="margin-top: 6px;">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2" style="vertical-align: middle;">No</th>
                        <th rowspan="2" style="vertical-align: middle;">Kode</th>
                        <th rowspan="2" style="vertical-align: middle;">Nama Barang</th>
                        <th rowspan="2" style="vertical-align: middle;">Jenis Barang</th>
                        <th rowspan="2" style="vertical-align: middle;">Harga</th>
                        <th rowspan="2" style="vertical-align: middle;">Stok</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $b)
                    <tr class="text-center">
                        <input type="hidden" class="delete_id" value="{{$b->id}}">
                        <td>{{ $loop->iteration }}</td>
                        <td>{!! DNS1D::getBarcodeHTML("$b->kode",'EAN13', 2,33) !!}{{$b->kode}}</td>
                        <td style="vertical-align: middle;">{{ $b->nama_barang }}</td>
                        <td style="vertical-align: middle;">{{ $b->jenis_barang }}</td>
                        <td style="vertical-align: middle;">{{ $b->harga }}</td>
                        <td style="vertical-align: middle;">{{ $b->stok }}</td>
                        <td class="text-center">
                            <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" href="#"
                                data-target="#largeModal{{$b->id}}"><i class="fa fa-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{route('barang.destroy', $b->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm btndelete"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                        @include('barang.editbarang')
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btndelete').click(function(e) {
        e.preventDefault();

        var deleteid = $(this).closest("tr").find('.delete_id').val();

        swal({
                title: "Apakah anda yakin?",
                text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    var data = {
                        "_token": $('input[name=_token]').val(),
                        'id': deleteid,
                    };
                    $.ajax({
                        type: "DELETE",
                        url: 'barang/' + deleteid,
                        data: data,
                        success: function(response) {
                            swal(response.status, {
                                    icon: "success",
                                })
                                .then((result) => {
                                    location.reload();
                                });
                        }
                    });
                }
            });
    });

});
</script>
@endsection