@extends("layout.mainlayout")
@section("page_title","Pembayaran")
@section("title","Data Pembayaran")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/pembayaran">Pembayaran</a></li>
<li class="breadcrumb-item active">Tambah Pembayaran</li> 
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
        <h3 class="card-title">Tambah Pembayaran</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data Temuan</h1> -->
    <form action="/pembayaran/addpembayaran" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Tanggal Pembayaran</label>
                    <input type="date" name="tgl_pembayaran" class="form-control" value="{{old('tgl_pembayaran') }}">
                    <div class="text-danger">
                        @error('tgl_pembayaran')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Total Pembayaran</label>
                    <input name="total_pembayaran" class="form-control" value="{{old('total_pembayaran') }}">
                    <div class="text-danger">
                        @error('total_pembayaran')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control" value="{{old('bukti_pembayaran') }}">
                    <div class="text-danger">
                        @error('bukti_pembayaran')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Status Pembayaran </label>
                    @error('status_pembayaran')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </label>
                    <div class="col-sm-14">
                      <select name="status_pembayaran" class="form-control">
                        <option value="">-Pilih-</option>
                        <option @if(old('status_pembayaran')=='0') selected @endif value="0">Lunas</option>
                        <option @if(old('status_pembayaran')=='1') selected @endif value="1">DP</option>
                      </select>
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
