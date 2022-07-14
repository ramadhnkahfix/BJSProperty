@extends('layout.mainlayout')
@section('title','edit pembayaran')

@section('content')
<form action="{{route('edit.pembayaran', $pembayaran->id_pembayaran)}}" method="POST">

    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Penerimaan</label>
                    <input type="number" name="penerimaan_id" class="form-control" value="{{$pembayaran->penerimaan_id}}" readonly>
                </div>

                <div class="form-group">
                    <label>Tanggal Pembayaran</label>
                    <input type="date" name="tgl_pembayaran" class="form-control" value="{{$pembayaran->tgl_pembayaran}}">
                    <div class="text-danger">
                        @error('tgl_pembayaran')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Total Pembayaran</label>
                    <input name="total_pembayaran" class="form-control" value="{{$pembayaran->total_pembayaran}}">
                    <div class="text-danger">
                        @error('total_pembayaran')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" class="form-control" value="{{$pembayaran->bukti_pembayaran}}">
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
                            <option value="{{$pembayaran->status_pembayaran}}">-Pilih-</option>
                            <option @if(old('status_pembayaran')=='0' ) selected @endif value="0">Lunas</option>
                            <option @if(old('status_pembayaran')=='1' ) selected @endif value="1">DP</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                </div>
            </div>
        </div>


</form>
@endsection