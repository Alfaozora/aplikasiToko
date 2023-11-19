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
    <form class="needs-validation" method="post" action="{{route('register.store')}}" validate>
        @csrf
        <div class="card">
            <div class="card-header">
                <strong>Form</strong> Pengguna Baru
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="form-horizontal">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-nama" class=" form-control-label">Nama</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-nama" name="name"
                                placeholder="Masukan Nama" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Email</label></div>
                        <div class="col-12 col-md-9"><input type="email" id="hf-email" name="email"
                                placeholder="Masukan Email" class="form-control" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="input-group">
                                <input type="password" id="hf-password" name="password" placeholder="Masukan Password"
                                    class="form-control">
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
                        <div class="col-12 col-md-9"><input type="password" id="hf-password"
                                name="password_confirmation" placeholder="Masukan Ulang Password" class="form-control">
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
<style>
.d-none {
    display: none !important;
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var passwordInput = document.getElementById("hf-password");
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
@endsection