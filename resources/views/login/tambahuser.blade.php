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
                    <li>
                        <a href="{{route('register.index')}}">Register</a>
                    </li>
                    <li class="active">Tambah User</li>
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
    <div class="card">
        <div class="card-header">
            <strong>Form</strong> Pengguna Baru
        </div>
        <div class="card-body card-block">
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-nama" class=" form-control-label">Nama</label></div>
                <div class="col-12 col-md-9"><input type="text" id="name" placeholder="Masukan Nama"
                        class="form-control" value="{{ old('name') }}">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Email</label></div>
                <div class="col-12 col-md-9"><input type="email" id="email" placeholder="Masukan Email"
                        class="form-control" value="{{ old('email') }}">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <div class="input-group">
                        <input type="password" id="password" placeholder="Masukan Password" class="form-control">
                        <div class="input-group-append">
                            <button type="button" id="show-password-btn" class="btn btn-secondary"><i
                                    class="fa fa-eye"></i></button>
                            <button type="button" id="hide-password-btn" class="btn btn-secondary d-none"><i
                                    class="fa fa-eye-slash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Re-Type
                        Password</label>
                </div>
                <div class="col-12 col-md-9"><input type="hf-password" id="hf-password" name="password_confirmation"
                        placeholder="Masukan Ulang Password" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Status</label></div>
                <div class="col-12 col-md-9">
                    <select name="role" id="role" class="form-control">
                        <option value="">Silahkan Pilih</option>
                        @foreach($roles as $r)
                        <option value="{{$r->id}}">{{$r->role}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button class="btn btn-register btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.d-none {
    display: none !important;
}
</style>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var passwordInput = document.getElementById("password");
    var showPasswordBtn = document.getElementById("show-password-btn");
    var hidePasswordBtn = document.getElementById("hide-password-btn");

    showPasswordBtn.addEventListener("click", function() {
        passwordInput.type = "text";
        showPasswordBtn.classList.add("d-none");
        hidePasswordBtn.classList.remove("d-none");
    });

    hidePasswordBtn.addEventListener("click", function() {
        passwordInput.type = "password";
        hidePasswordBtn.classList.add("d-none");
        showPasswordBtn.classList.remove("d-none");
    });
});
</script>
<script>
$(document).ready(function() {
    $(".btn-register").click(function() {
        var role = $("#role").val();
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var token = $("meta[name='csrf-token']").attr("content");

        if (role.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: 'Role Harus Diisi !'
            });
        } else if (name.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Nama Harus Diisi !'
            });
        } else if (email.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Alamat Email Harus Diisi !'
            });
        } else if (password.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Password Harus Diisi !'
            });
        } else {
            $.ajax({
                url: "{{ route('register.store') }}",
                type: "POST",
                cache: false,
                data: {
                    "role": role,
                    "name": name,
                    "email": email,
                    "password": password,
                    "_token": token
                },

                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            type: 'success',
                            title: 'Register Berhasil!',
                            text: 'Selamat Data Berhasil Ditambahkan'
                        });

                        $("#role").val('');
                        $("#name").val('');
                        $("#email").val('');
                        $("#password").val('');
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Register Gagal',
                            text: 'Silahkan Coba Lagi!'
                        });
                    }
                    console.log(response);
                },
                error: function(response) {
                    Swal.fire({
                        type: 'error',
                        title: 'Oops!',
                        text: 'Server Error!'
                    });
                }
            })
        }
    });
});
</script>
@endsection