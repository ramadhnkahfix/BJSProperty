@extends('layout.mainlayout')
@section('title','edit penerimaan')

@section('content')
<form action="{{route('edit.penerimaan', $penerimaan->id_penerimaan)}}" method="POST" enctype="multipart/form-data">
@csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">

            <div class="form-group">
                    <label>Tanggal Penerimaan</label>
                    <input type="date" name="tgl_penerimaan" class="form-control" value="{{$penerimaan->tgl_penerimaan}}">
                    <div class="text-danger">
                        @error('tgl_penerimaan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Bukti Penerimaan</label>
                    <input type="file" name="bukti" class="form-control" accept="image/jpg, image/png, image/jpeg, .pdf" value="{{$penerimaan->bukti}}">
                    <div class="text-danger">
                        @error('bukti')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Catatan</label>
                    <input name="catatan" class="form-control" value="{{$penerimaan->catatan}}">
                    <div class="text-danger">
                        @error('catatan')
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