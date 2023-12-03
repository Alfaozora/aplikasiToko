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
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Satuan</label></div>
                        <div class="col-12 col-md-9">
                            <select name="kategori" id="kategori" class="form-control"
                                value="{{old('kategori', $b->kategori)}}">
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
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-nama" class=" form-control-label">Nama Barang</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-nama_barang" name="nama_barang"
                                placeholder="Masukan Nama Barang" class="form-control"
                                value="{{ old('nama_barang', $b->nama_barang) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-stok_barang" class=" form-control-label">Stok
                                Barang</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-stok_barang" name="stok_barang"
                                placeholder="Masukan Stok Barang" class="form-control"
                                value="{{ old('stok_barang', $b->stok_barang) }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-jenis" class=" form-control-label">Barang Masuk</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="hf-masuk" name="masuk" placeholder="Masukan Barang Masuk"
                                class="form-control" value="{{old('masuk', $b->masuk)}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-keluar" class=" form-control-label">Barang
                                Keluar</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-keluar" name="keluar"
                                placeholder="Masukan Barang Keluar" class="form-control"
                                value="{{old('keluar', $b->keluar)}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-sisa" class=" form-control-label">Sisa</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-sisa" name="sisa" placeholder=""
                                class="form-control" value="{{old('sisa', $b->sisa)}}" disabled="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Satuan</label></div>
                        <div class="col-12 col-md-9">
                            <select name="satuan" id="satuan" class="form-control"
                                value="{{old('satuan', $b->satuan)}}">
                                <option value="">Silahkan Pilih</option>
                                <option value="pcs">Pcs</option>
                                <option value="box">Box</option>
                                <option value="lusin">Lusin</option>
                                <option value="kodi">Kodi</option>
                                <option value="gross">Gross</option>
                                <option value="rim">Rim</option>
                                <option value="meter">Meter</option>
                                <option value="batang">Batang</option>
                                <option value="buah">Buah</option>
                                <option value="lembar">Lembar</option>
                                <option value="liter">Liter</option>
                                <option value="botol">Botol</option>
                                <option value="kotak">Kotak</option>
                            </select>
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