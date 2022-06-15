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
      <!-- <h1>Tambah Data Rencana Pengadaaan</h1> -->
      <form action="/pemesanan/dropdownPemesanan" method="post" enctype="multipart/form-data">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            Data Barang : 
            <select class="form-control" name="id_pemesanan">
            @foreach ($pemesanan as $data)
            <option value="{{ $data->id_pemesanan}}">{{ $data->nama_barang}}</option>
            @endforeach
            </select><br>        
            <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      <div class="card-footer">

    </div>
    <!-- /.card-body -->

    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
  <!-- </div> -->
  <!-- </div> -->
  <!-- /.card -->
@endsection
