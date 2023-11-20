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
<form method="post" action="{{route('supplier.update', $s->id)}}" validate>
    @csrf
    @method('PUT')
    <div class="modal fade" id="largeModal{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Data Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-supplier" class=" form-control-label">Supplier</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-supplier" name="supplier"
                                placeholder="Masukan Jenis Supplier" class="form-control"
                                value="{{ old('supplier', $s->supplier) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-nama_supplier" class=" form-control-label">Nama
                                Supplier</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-nama_supplier" name="nama"
                                placeholder="Masukan Nama Supplier" class="form-control"
                                value="{{ old('nama', $s->nama) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-alamat" class=" form-control-label">Alamat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-alamat" name="alamat" placeholder="Masukan Alamat Supplier"
                                class="form-control" value="{{old('alamat', $s->alamat)}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-no_telp" class=" form-control-label">No Hp</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-no_telp" name="no_telp"
                                placeholder="Masukan No Hp" class="form-control"
                                value="{{old('no_telp', $s->no_telp)}}">
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