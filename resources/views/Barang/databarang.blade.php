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
<div class="col-lg-12" style="margin-top: 15px;" id="searchResults">
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
            <div class="row">
                <div class="col-lg-2">
                    <div class="card-body text-secondary" style="padding-left: 0px;">
                        <a type="button" class="btn btn-primary" href="{{route('barang.create')}}"><i
                                class="fa fa-plus"></i>&nbsp;
                            Tambah Barang</a>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <form id="searchForm" class="form-horizontal">
                        <div class="card-body input-group form-group" style="padding-left: 0px;">
                            <select name="kategori" id="kategori" class="form-control" onchange="kategori()">
                                <option value="">Silahkan Pilih Departemen</option>
                                <option value="CAFEPASTRY">CAFEPASTRY</option>
                                <option value="BAR RESTO">BAR RESTO</option>
                                <option value="PRODUK">PRODUK</option>
                                <option value="MINERAL WATER">MINERAL WATER</option>
                                <option value="AMENITIS HK">AMENITIS HK</option>
                                <option value="AMNETIS MEETING">AMENITIS MEETING</option>
                                <option value="HK DAN CHEMICAL">HK DAN CHEMICAL</option>
                                <option value="DUS">DUS</option>
                                <option value="ME">ME</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2" style="vertical-align: middle;">No</th>
                        <th rowspan="2" style="vertical-align: middle;">Departemen</th>
                        <th rowspan="2" style="vertical-align: middle;">Nama Barang</th>
                        <th rowspan="2" style="vertical-align: middle;">Stok Barang</th>
                        <th rowspan="2" style="vertical-align: middle;">Barang Masuk</th>
                        <th rowspan="2" style="vertical-align: middle;">Barang Keluar</th>
                        <th rowspan="2" style="vertical-align: middle;">Sisa Barang</th>
                        <th rowspan="2" style="vertical-align: middle;">Satuan</th>
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
                        <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                        <td style="vertical-align: middle;">{{ $b->kategori}}</td>
                        <td style="vertical-align: middle;">{{ $b->nama_barang }}</td>
                        <td style="vertical-align: middle;">{{ $b->stok_barang }}</td>
                        <td style="vertical-align: middle;">{{ $b->masuk }}</td>
                        <td style="vertical-align: middle;">{{ $b->keluar }}</td>
                        <td style="vertical-align: middle;">{{ $b->sisa }}</td>
                        <td style="vertical-align: middle;">{{ $b->satuan}}</td>
                        <td class="text-center" style="vertical-align: middle;">
                            <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" href="#"
                                data-target="#largeModal{{$b->id}}"><i class="fa fa-edit"></i></a>
                        </td>
                        <td class="text-center" style="vertical-align: middle;">
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
<script>
$(document).ready(function() {
    $('#kategori').change(function(e) {
        e.preventDefault();
        var kategori = $('#kategori').val();
        $.ajax({
            type: "GET",
            url: "{{route('barang.databarang')}}",
            data: {
                kategori: kategori
            },
            success: function(response) {
                $('#searchResults').html(response);
                $('#searchResults').show();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});
</script>
@endsection