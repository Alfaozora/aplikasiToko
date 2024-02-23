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
            <div class="row">
                <div class="col-lg-2">
                    <div class="card-body text-secondary" style="padding-left: 0px;">
                        <a type="button" class="btn btn-primary" data-toggle="modal" href="#"
                            data-target="#modalBarang"><i class="fa fa-plus"></i>&nbsp;
                            Tambah Barang</a>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card-body input-group form-group" style="padding-left: 0px;">
                        <select id="kategoriDropdown" class="form-control">
                            <option value="" selected>Silahkan Pilih Departemen</option>
                            @foreach($departemens as $d)
                            <option value="{{$d->kategori}}">{{$d->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2" style="vertical-align: middle;">No</th>
                        <th rowspan="2" style="vertical-align: middle;">Departemen</th>
                        <th rowspan="2" style="vertical-align: middle;">Nama Barang</th>
                        <th rowspan="2" style="vertical-align: middle;">Stok Awal</th>
                        <th rowspan="2" style="vertical-align: middle;">Barang Masuk</th>
                        <th rowspan="2" style="vertical-align: middle;">Barang Keluar</th>
                        <th rowspan="2" style="vertical-align: middle;">Sisa Stok</th>
                        <th rowspan="2" style="vertical-align: middle;">Satuan</th>
                        <th colspan="3">Aksi</th>
                    </tr>
                    <tr>
                        <th>Kelola</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody id="resultTable">
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
                            <a type="button" class="btn btn-success btn-sm" data-toggle="modal" href="#"
                                data-target="#"><i class="fa fa-bars"></i></a>
                        </td>
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

    <!-- Modal Tambah Data Barang -->
    <div class="modal fade" id="modalBarang" tabindex="-1" role="dialog" aria-labelledby="modalBarang"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBarang">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Departemen</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="kategori" id="kategori" class="form-control">
                                @foreach($departemens as $d)
                                <option value="{{$d->kategori}}">{{$d->kategori}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-nama_barang" class=" form-control-label">Nama
                                Barang</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="nama_barang" name="nama_barang"
                                placeholder="Masukan Nama Barang" class="form-control" value="{{ old('nama_barang') }}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-jenis" class=" form-control-label">Stok
                                Barang</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="stok_barang" name="stok_barang" placeholder="Masukan Stok Barang"
                                class="form-control" value="{{old('stok_barang')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-harga" class=" form-control-label">Barang
                                Masuk</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="masuk" name="masuk"
                                placeholder="Masukan Barang Masuk" class="form-control" value="{{old('masuk')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-stok" class=" form-control-label">Barang
                                Keluar</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="keluar" name="keluar"
                                placeholder="Masukan Barang Keluar" class="form-control" value="{{old('keluar')}}">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-stok" class=" form-control-label">Sisa</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="sisa" name="sisa" placeholder=""
                                class="form-control" value="{{old('sisa')}}" disabled="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Satuan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="satuan" id="satuan" class="form-control">
                                <option value="">Silahkan Pilih</option>
                                <option value="pcs">Pcs</option>
                                <option value="box">Box</option>
                                <option value="lusin">Lusin</option>
                                <option value="kg">Kg</option>
                                <option value="buah">Buah</option>
                                <option value="lembar">Lembar</option>
                                <option value="liter">Liter</option>
                                <option value="botol">Botol</option>
                                <option value="kotak">Kotak</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row form-group">
                        <div class="col col-md-3"><label for="hf-profit" class=" form-control-label">Profit</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="text" id="hf-profit" name="profit"
                                class="form-control" disabled="">
                        </div>
                    </div> -->
                </div>
                <div class="card-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-tambah btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Data Barang -->
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

<!-- script ajax untuk melakukan pemfilteran berdasarkan kategori -->
<script>
$(document).ready(function() {
    $('#kategoriDropdown').change(function(e) {
        e.preventDefault();

        var kategori = $('#kategoriDropdown').val();

        $.ajax({
            type: "GET",
            url: "{{ route('barang.cari') }}",
            data: {
                kategori: kategori
            },
            success: function(response) {
                $('#resultTable').html(response);
                $('#resultTable').show();
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});
</script>

<!-- script tambah data -->
<script>
$(document).ready(function() {
    $(".btn-tambah").click(function() {
        var kategori = $("#kategori").val();
        var nama_barang = $("#nama_barang").val();
        var stok_barang = $("#stok_barang").val();
        var masuk = $("#masuk").val();
        var keluar = $("#keluar").val();
        var satuan = $("#satuan").val();
        var token = $("meta[name='csrf-token']").attr("content");

        if (kategori.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: 'Kategori Harus Diisi !'
            });
        } else if (nama_barang.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Nama Barang Harus Diisi !'
            });
        } else if (stok_barang.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Stok Barang Harus Diisi !'
            });
        } else if (masuk.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Barang Masuk Harus Diisi !'
            });
        } else if (keluar.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Barang Keluar Harus Diisi !'
            });
        } else if (satuan.length == "") {
            Swal.fire({
                type: 'warning',
                title: 'Oops...',
                text: 'Satuan Harus Diisi !'
            });
        } else {
            $.ajax({
                url: "{{ route('barang.store') }}",
                type: "POST",
                cache: false,
                data: {
                    "kategori": kategori,
                    "nama_barang": nama_barang,
                    "stok_barang": stok_barang,
                    "masuk": masuk,
                    "keluar": keluar,
                    "satuan": satuan,
                    "_token": token
                },

                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            type: 'success',
                            title: 'Register Berhasil!',
                            text: 'Selamat Data Berhasil Ditambahkan'
                        });

                        $("#kategori").val('');
                        $("#nama_barang").val('');
                        $("#stok_barang").val('');
                        $("#masuk").val('');
                        $("#keluar").val('');
                        $("#satuan").val('');
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Tambah Barang Gagal',
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