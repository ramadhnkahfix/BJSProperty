@extends("layout.mainlayout")

@section("page_title","Inspektorat | Tambah Pengadaan")

@section("title","Tambah Pengadaan Barang")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/pemesanan">Pengadaan Barang</a></li>
<li class="breadcrumb-item active">Tambah Pengadaan Barang</li> 
@endsection

@section('custom_css')  
<!-- DataTables -->
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset ('asset/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset ('asset/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset ('asset/dist/css/adminlte.min.css')}}">
@endsection


@section('content')
 <!-- Default box -->
 <div class="card">    
    <div class="card-header">
        <h3 class="card-title">Tambah Data</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>

    <div class="card-body">
    <!-- <h1>Tambah Data Rencana Pengadaaan</h1> -->
      <form action="/pemesanan/addpemesanan" method="post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(
            ) ?>">

            Nama Barang : <input type="text" class="form-control" name="nama_barang"
            value ="{{ $pemesanan[0]->nama_barang }}"><br>
            Jumlah Barang : <input type="text" class="form-control" name="jml_barang"
            value ="{{ $pemesanan[0]->jml_barang }}"><br>
            Harga Barang : <input type="text" class="form-control" name="harga_barang"
            value ="{{ $pemesanan[0]->harga_barang }}"><br>
            <input type="submit" value="Update">
            
      </form>
    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
  <!-- </div> -->
  <!-- </div> -->
  <!-- /.card -->
@endsection
