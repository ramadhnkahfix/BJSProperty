@extends('layout.mainlayout')
@section('title','edit suplier')

@section('content')
<form action="{{route('edit.suplier', $suplier->id_suplier)}}" method="POST">
    @method('POST')
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Nama Suplier</label>
                    <input name="nama_suplier" class="form-control" value="{{$suplier->nama_suplier}}">
                    <div class="text-danger">
                        @error('nama_suplier')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label >Jenis Kelamin </label>
                    @error('jk_suplier')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </label>
                    <div class="col-sm-14">
                      <select name="jk_suplier" class="form-control">
                        <option value="{{$suplier->jk_suplier}}">-Pilih-</option>
                        <option @if(old('jk_suplier')=='0') selected @endif value="0">Laki-Laki</option>
                        <option @if(old('jk_suplier')=='1') selected @endif value="1">Perempuan</option>
                      </select>
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
                    <label>Status Suplier </label>
                    @error('status_suplier')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </label>
                    <div class="col-sm-14">
                      <select name="status_suplier" class="form-control">
                        <option value="{{$suplier->status_suplier}}">-Pilih-</option>
                        <option @if(old('status_suplier')=='0') selected @endif value="0">Aktif</option>
                        <option @if(old('status_suplier')=='1') selected @endif value="1">Nonaktif</option>
                      </select>
                    </div>
                  </div>

                
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
    </div>


</form>
@endsection