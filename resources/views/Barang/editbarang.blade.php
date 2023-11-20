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
<form method="post" action="{{route('barang.update', $b->id)}}" validate>
    @csrf
    @method('PUT')
    <div class="modal fade" id="largeModal{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-nama" class=" form-control-label">Kode Barang</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-kode" name="kode"
                                placeholder="Masukan Kode Barang" class="form-control"
                                value="{{ old('kode', $b->kode) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-nama_barang" class=" form-control-label">Nama
                                Barang</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-nama_barang" name="nama_barang"
                                placeholder="Masukan Nama Barang" class="form-control"
                                value="{{ old('nama_barang', $b->nama_barang) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-jenis" class=" form-control-label">Jenis Barang</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-jenis_barang" name="jenis_barang"
                                placeholder="Masukan Jenis Barang" class="form-control"
                                value="{{old('jenis_barang', $b->jenis_barang)}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-harga" class=" form-control-label">Harga</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-harga" name="harga"
                                placeholder="Masukan Harga" class="form-control" value="{{old('harga', $b->harga)}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-stok" class=" form-control-label">Stok</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-stok" name="stok"
                                placeholder="Masukan Banyaknya Stok" class="form-control"
                                value="{{old('stok', $b->stok)}}">
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