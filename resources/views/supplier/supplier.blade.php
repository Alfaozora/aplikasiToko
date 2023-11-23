@extends('layouts.main')
@section('konten')
@include('sweetalert::alert')
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
                    <li class="active">Data Supplier</li>
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
            <strong class="card-title">Data Supplier</strong>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-primary" href="{{route('supplier.create')}}"><i
                    class="fa fa-plus"></i>&nbsp;
                Tambah Supplier</a>
            <table class="table table-bordered" style="margin-top: 6px;">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2" style="vertical-align: middle;">No</th>
                        <th rowspan="2" style="vertical-align: middle;">Supplier</th>
                        <th rowspan="2" style="vertical-align: middle;">Nama</th>
                        <th rowspan="2" style="vertical-align: middle;">Alamat</th>
                        <th rowspan="2" style="vertical-align: middle;">No HP</th>
                        <th colspan="3">Aksi</th>
                    </tr>
                    <tr>
                        <th>Chat</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $s)
                    <tr class="text-center">
                        <input type="hidden" class="delete_id" value="{{$s->id}}">
                        <td>{{ $loop->iteration }}</td>
                        <td style="vertical-align: middle;">{{ $s->supplier }}</td>
                        <td style="vertical-align: middle;">{{ $s->nama }}</td>
                        <td style="vertical-align: middle;">{{ $s->alamat }}</td>
                        <td style="vertical-align: middle;">{{ $s->no_telp }}</td>
                        <td class="text-center">
                            <a type="button" class="btn btn-success btn-sm" href="#"><i
                                    class="fa fa-phone-square"></i></a>
                        </td>
                        <td class="text-center">
                            <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" href="#"
                                data-target="#largeModal{{$s->id}}"><i class="fa fa-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{route('supplier.destroy', $s->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm btndelete"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                        @include('supplier.editsupplier')
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
                        url: 'supplier/' + deleteid,
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