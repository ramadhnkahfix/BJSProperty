@extends('layout.mainlayout')
@section('title','edit barang')

@section('content')
<form action="{{route('edit.barang', $barang->id_barang)}}" method="POST">
    @method('PATCH')
@csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input name="nama_barang" class="form-control" value="{{$barang->nama_barang}}">
                    <div class="text-danger">
                        @error('nama_barang')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input name="jml_barang" class="form-control" value="{{$barang->jml_barang}}">
                    <div class="text-danger">
                        @error('jml_barang')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Harga Barang</label>
                    <input name="harga_barang" class="form-control" value="{{$barang->harga_barang}}">
                    <div class="text-danger">
                        @error('harga_barang')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
            </div>
        </div>
    </div>


</form>
@endsection