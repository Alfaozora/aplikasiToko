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
<form method="post" action="{{route('register.update', $u->id)}}" validate>
    @csrf
    @method('PUT')
    <div class="modal fade" id="largeModal{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-nama" class=" form-control-label">Nama</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-nama" name="name"
                                placeholder="Masukan Nama" class="form-control" value="{{ old('name', $u->name) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Email</label></div>
                        <div class="col-12 col-md-9"><input type="email" id="hf-email" name="email"
                                placeholder="Masukan Email" class="form-control" value="{{ old('email', $u->email) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Password
                                Lama</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="password" id="hf-password" name="old_password"
                                placeholder="Masukan Password" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">
                                Password Baru</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="password" id="hf-password" name="new_password"
                                placeholder="Masukan Password Baru" class="form-control" v>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-password" class=" form-control-label">
                                Konfirmasi Password</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="password" id="hf-password"
                                name="password_confirmation" placeholder="Masukan Ulang Password" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>