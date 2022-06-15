@extends('layout.template')
@section('title','edit suplier')

@section('content')
<form action="/suplier/updatesuplier/{{ $suplier->id_suplier }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Nama Suplier</label>
                    <input name="nama_suplier" class="form-control" value="{{$suplier->nama_suplier}}"readonly>
                    <div class="text-danger">
                        @error('nama_suplier')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>JK Suplier</label>
                    <input name="jk_suplier" class="form-control" value="{{$suplier->jk_suplier}}">
                    <div class="text-danger">
                        @error('jk_suplier')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>No. Telp</label>
                    <input name="no_telp" class="form-control" value="{{$suplier->no_telp}}">
                    <div class="text-danger">
                        @error('no_telp')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat Suplier</label>
                    <input name="alamat_suplier" class="form-control" value="{{$suplier->alamat_suplier}}">
                    <div class="text-danger">
                        @error('alamat_suplier')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Status Suplier</label>
                    <input name="status_suplier" class="form-control" value="{{$suplier->status_suplier}}">
                    <div class="text-danger">
                        @error('status_suplier')
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