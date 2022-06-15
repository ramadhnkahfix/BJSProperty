@extends('layout.template')
@section('title','edit pegawai')

@section('content')
<form action="/pegawai/updatepegawai/{{ $pegawai->id_pegawai }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

            <div class="form-group">
                    <label>ID Pegawai</label>
                    <input name="id_pegawai" class="form-control" value="{{$pegawai->id_pegawai}}"readonly>
                    <div class="text-danger">
                        @error('id_pegawai')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input name="nama_pegawai" class="form-control" value="{{$pegawai->nama_pegawai}}">
                    <div class="text-danger">
                        @error('nama_pegawai')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>JK pegawai</label>
                    <input name="jk_pegawai" class="form-control" value="{{$pegawai->jk_pegawai}}">
                    <div class="text-danger">
                        @error('jk_pegawai')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>No. Telp</label>
                    <input name="no_telp" class="form-control" value="{{$pegawai->no_telp}}">
                    <div class="text-danger">
                        @error('no_telp')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat Pegawai</label>
                    <input name="alamat_pegawai" class="form-control" value="{{$pegawai->alamat_pegawai}}">
                    <div class="text-danger">
                        @error('alamat_pegawai')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Status Pegawai</label>
                    <input name="status_pegawai" class="form-control" value="{{$pegawai->status_pegawai}}">
                    <div class="text-danger">
                        @error('status_pegawai')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
    </div>


</form>
@endsection