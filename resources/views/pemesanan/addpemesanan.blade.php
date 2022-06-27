@extends("layout.mainlayout")
@section("page_title","Pemesanan")
@section("title","Data Pemesanan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/pemesanan">Pemesanan</a></li>
<li class="breadcrumb-item active">Tambah Pemesanan</li>
@endsection

@section('custom_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Pemesanan</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <!-- <h1>Tambah Data Temuan</h1> -->
        <form action="/pemesanan/addpemesanan" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="content">
                <div class="row">
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label>Tanggal Pemesanan</label>
                            <input type="date" name="tgl_pemesanan" class="form-control" value="{{old('tgl_pemesanan') }}">
                            <div class="text-danger">
                                @error('tgl_pemesanan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group">
                    <label>Catatan</label>
                    <input name="catatan" class="form-control" value="{{old('catatan') }}">
                    <div class="text-danger">
                        @error('catatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div> -->

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input name="nama_barang" class="form-control" value="{{old('nama_barang') }}">
                            <div class="text-danger">
                                @error('nama_barang')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>jml_barang</label>
                            <input name="jml_barang" class="form-control" value="{{old('jml_barang') }}">
                            <div class="text-danger">
                                @error('jml_barang')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>harga_barang</label>
                            <input name="harga_barang" class="form-control" value="{{old('harga_barang') }}">
                            <div class="text-danger">
                                @error('harga_barang')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Simpan</button>

        </form>

    </div>
    <!-- /.card-body -->
</div>
<!-- card -->
@endsection