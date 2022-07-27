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
                    <input type="text" name="penerimaan_id" value="{{$pembayaran->penerimaan_id}}" hidden>
                    <input type="text" name="kode_penerimaan" class="form-control" value="{{$pembayaran->kode_penerimaan}}" readonly>
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
                    <input name="total_pembayaran" class="form-control" value="{{$pembayaran->total_pembayaran}}" readonly>
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
                            <option value="{{$pembayaran->status_pembayaran}}" selected disabled>DP</option>
                            <option @if(old('status_pembayaran')=='0' ) selected @endif value="0">Lunas</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="hutang">
                        <label for="">Hutang</label>
                        <input type="text" class="form-control" value="{{$pembayaran->hutang}}">
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                </div>
            </div>
        </div>
</form>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Hutang
        $('select[name="status_pembayaran"]').on('change', function() {
            let status = $(this).val();
            if (status == 1) {
                $('.hutang').append('<label>Jumlah Di Bayarkan</label><input type="number" name="bayar" class="form-control" required>');
            } else {
                $('.hutang').empty();
            }
        });
    });
</script>
@endsection