@extends("layout.mainlayout")
@section("page_title","Pegawai")
@section("title","Data Pegawai")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/pegawai">Pegawai</a></li>
<li class="breadcrumb-item active">Tambah Pegawai</li> 
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
        <h3 class="card-title">Tambah Pegawai</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
    <!-- <h1>Tambah Data Temuan</h1> -->
    <form action="/pegawai/addpegawai" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input name="nama_pegawai" class="form-control" value="{{old('nama_pegawai') }}">
                    <div class="text-danger">
                        @error('nama_pegawai')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label >Jenis Kelamin </label>
                    @error('jk_pegawai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </label>
                    <div class="col-sm-14">
                      <select name="jk_pegawai" class="form-control">
                        <option value="">-Pilih-</option>
                        <option @if(old('jk_pegawai')=='0') selected @endif value="0">Laki-Laki</option>
                        <option @if(old('jk_pegawai')=='1') selected @endif value="1">Perempuan</option>
                      </select>
                    </div>
                  </div>

                <div class="form-group">
                    <label>No. Telp </label>
                    <input name="no_telp" class="form-control" value="{{old('no_telp') }}">
                    <div class="text-danger">
                        @error('no_telp')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat Pegawai</label>
                    <input name="alamat_pegawai" class="form-control" value="{{old('alamat_pegawai') }}">
                    <div class="text-danger">
                        @error('alamat_pegawai')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Status Pegawai </label>
                    @error('status_pegawai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </label>
                    <div class="col-sm-14">
                      <select name="status_pegawai" class="form-control">
                        <option value="">-Pilih-</option>
                        <option @if(old('status_pegawai')=='0') selected @endif value="0">Aktif</option>
                        <option @if(old('status_pegawai')=='1') selected @endif value="1">Nonaktif</option>
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
