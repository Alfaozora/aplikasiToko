@extends('layouts.main')
@section('konten')
@include('sweetalert::alert')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Register</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Register</li>
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
            <strong class="card-title">Data Pengguna Aplikasi</strong>
        </div>
        <div class="card-body">
            <a type="button" class="btn btn-primary" href="{{route('register.create')}}"><i
                    class="fa fa-plus"></i>&nbsp; Tambah User</a>
            <table class="table table-bordered" style="margin-top: 6px;">
                <thead class="text-center" style="vertical-align: middle;">
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Email</th>
                        <th rowspan="2">Status</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $u)
                    <tr class="text-center">
                        <input type="hidden" class="delete_id" value="{{$u->id}}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>
                            @if ($u->role == 1)
                            Super Admin
                            @elseif ($u->role == 2)
                            Admin
                            @elseif ($u->role == 3)
                            Karyawan
                            @endif
                        </td>
                        @if($u->role == 1)
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" disabled="" href="#"
                                data-toggle="modal" data-target="#largeModal"><i class="fa fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" disabled=""><i class="fa fa-trash"></i></button>
                        </td>
                        @elseif($u->role == 2)
                        <td>
                            <a type="button" class="btn btn-warning btn-sm" href="#" data-toggle="modal"
                                data-target="#largeModal"><i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" disabled=""><i class="fa fa-trash"></i></button>
                        </td>
                        @else
                        <td>
                            <a type="button" class="btn btn-warning btn-sm" href="#" data-toggle="modal"
                                data-target="#largeModal"><i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('register.destroy', $u->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm btndelete"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                        @include('login.edit')
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                        url: 'register/' + deleteid,
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