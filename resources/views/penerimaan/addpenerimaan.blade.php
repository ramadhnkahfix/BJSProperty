@extends("layout.mainlayout")
@section("page_title","Penerimaan")
@section("title","Data Penerimaan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/penerimaan">Penerimaan</a></li>
<li class="breadcrumb-item active">Tambah Penerimaan</li>
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
        <h3 class="card-title">Tambah Penerimaan</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <!-- <h1>Tambah Data Temuan</h1> -->
        <form action="/penerimaan/addpenerimaan" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Tanggal Penerimaan</label>
                            <input type="text" name="tgl_penerimaan" style="background-color:transparent;" class="form-control form-control-border" value="{{date('D-d-M-Y')}}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Kode Pemesanan</label>
                            <select class="custom-select form-control-border" name="kode_pemesanan">
                                <option readonly> -- Pilih Pemesanan -- </option>
                                @foreach($pemesanan as $data)
                                <option value="{{$data->id}}">{{$data->kode_pemesanan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <h5>Detail Penerimaan</h5>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nomor</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang Diterima</th>
                                </tr>
                            </thead>
                            <tbody class="data-pemesanan">

                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Catatan</label>
                            <textarea name="catatan" id="catatanPenerimaan" cols="20" rows="5" class="form-control"></textarea>
                            <div class="text-danger">
                                @error('catatan')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Bukti Penerimaan</label>
                            <input type="file" name="bukti" class="form-control form-control-border" id="customFile" accept="image/jpg, image/png, image/jpeg, .pdf" value="{{old('bukti') }}">
                            <div class="text-danger">
                                @error('bukti')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="buttonSubmit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Get Detail Barang
    $(document).ready(function() {
        $('select[name="kode_pemesanan"]').on('change', function() {
            let pemesananId = $(this).val();
            if (pemesananId) {
                jQuery.ajax({
                    url: '/getDetailPemesanan/' + pemesananId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        num = 1;
                        total_harga = 0;
                        $('.data-pemesanan').empty();
                        $.each(data, function(key, value) {
                            $('.data-pemesanan').append('<tr><td><button type="button" class="btn btn-warning btn-sm" onclick="UpdateFunction(' + value['id'] + ')">Checked</button></td><td> Barang ke-' + num++ + '</td><td>' + value['nama_barang'] + '</td><td><div class="qty"><input name="quantity" class="form-control form-control-border" value="' + value['quantity'] + '"></div></td></tr>')
                            total_harga += value['harga'];
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    },
                });
            } else {
                $('.data-pemesanan').empty();
            }
        });
    });

    // Validation
    function UpdateFunction(id) {

        let token = $('meta[name="csrf-token"]').attr('content');
        let qty = $('input[name="quantity"]').val();
        jQuery.ajax({
            url: "/penerimaan/update/" + id,
            dataType: "JSON",
            type: "patch",
            data: {
                _token: token,
                id: id,
                quantity:qty
            },
            success: function(data) {
                console.log(data);
                alert('Berhasil di Update');
            },
            error: function(data) {
                console.log('Error:', data);
                alert('Something Wrong');
            }
        });
    }
    // Number Format
    function commaSeparateNumber(val) {
        // remove sign if negative
        var sign = 1;
        if (val < 0) {
            sign = -1;
            val = -val;
        }

        // trim the number decimal point if it exists
        let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();

        while (/(\d+)(\d{3})/.test(num.toString())) {
            // insert comma to 4th last position to the match number
            num = num.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }

        // add number after decimal point
        if (val.toString().includes('.')) {
            num = num + '.' + val.toString().split('.')[1];
        }

        // return result with - sign if negative
        return sign < 0 ? '-' + num : num;
    }
    // End Number Format
</script>
@endsection