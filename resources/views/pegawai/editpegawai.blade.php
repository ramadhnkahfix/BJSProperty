@extends('layout.mainlayout')
@section('title','edit pegawai')

@section('content')
<form action="{{route('edit.pegawai', $pegawai->id_pegawai)}}" method="POST">
    @method('POST')
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

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
                    <label >Jenis Kelamin </label>
                    @error('jk_pegawai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </label>
                    <div class="col-sm-14">
                      <select name="jk_pegawai" class="form-control">
                        <option value="{{$pegawai->jk_pegawai}}">-Pilih-</option>
                        <option @if(old('jk_pegawai')=='0') selected @endif value="0">Laki-Laki</option>
                        <option @if(old('jk_pegawai')=='1') selected @endif value="1">Perempuan</option>
                      </select>
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
                    <label>Status Pegawai </label>
                    @error('status_pegawai')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </label>
                    <div class="col-sm-14">
                      <select name="status_pegawai" class="form-control">
                        <option value="{{$pegawai->status_pegawai}}">-Pilih-</option>
                        <option @if(old('status_pegawai')=='0') selected @endif value="0">Aktif</option>
                        <option @if(old('status_pegawai')=='1') selected @endif value="1">Nonaktif</option>
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