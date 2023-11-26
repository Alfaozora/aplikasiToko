@extends('layouts.main')
@section('konten')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Point Of Sale</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Kasir</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4" style="margin-top: 15px;">
    <div class="card">
        <div class="card-header" style="background-color: #8080ff;">
            <i class="fa fa-search" style="color: white;"></i>
            <font style="color: white;"><strong>Cari</strong> Barang</font>
        </div>
        <div class="card-body card-block">
            <form id="searchForm" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-12">
                        <input type="text" id="exampleInputName2" name="search" id="searchInput"
                            placeholder="Masukan Kode/Nama Barang [ENTER]" required="" class="form-control">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-8" style="margin-top: 15px;">
    <div class="card">
        <div class="card-header" style="background-color: #8080ff;">
            <i class="fa fa-bars" style="color: white;"></i>
            <font style="color: white;"><strong>Hasil</strong> Pencarian</font>
        </div>
        <div class="card-body card-block" id="searchResults">
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangs as $barang)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</th>
                        <td>{{ $barang->kode }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->harga_jual }}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-primary btn-sm" style="border-radius: 5px;"><i
                                    class="fa fa-shopping-cart"></i>&nbsp;</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#searchInput').keypress(function(event) {
        if (event.which === 13) { // Check if the pressed key is Enter
            event.preventDefault(); // Prevent the default form submission

            var searchValue = $('#searchInput').val();

            $.ajax({
                url: "{{ route('kasir.search') }}",
                type: "GET",
                data: {
                    search: searchValue
                },
                success: function(data) {
                    $('#searchResults').html(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    });
});
</script>
@endsection