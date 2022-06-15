@extends("layout.mainlayout")
@section("page_title","Penerimaan")
@section("title","Data Penerimaan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/penerimaan">Penerimaan</a></li>
<li class="breadcrumb-item active">Tambah Penerimaan</li> 
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
        <h3 class="card-title">Tambah Penerimaan</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data Temuan</h1> -->
    <form action="/penerimaan/addpenerimaan" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Tanggal Penerimaan</label>
                    <input type="date" name="tgl_penerimaan" class="form-control" value="{{old('tgl_penerimaan') }}">
                    <div class="text-danger">
                        @error('tgl_penerimaan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Bukti Penerimaan</label>
                    <input type="file" name="bukti" class="form-control" value="{{old('bukti') }}">
                    <div class="text-danger">
                        @error('bukti')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Catatan</label>
                    <input name="catatan" class="form-control" value="{{old('catatan') }}">
                    <div class="text-danger">
                        @error('catatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>



        <button type="submit" class="btn btn-primary">Simpan</button>

      </form>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">

    </div>
    <!-- /.card-footer-->
  <!-- </div> -->
  <!-- </div> -->
  <!-- /.card -->
@endsection
