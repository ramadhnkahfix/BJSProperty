@extends("layout.mainlayout")

@section("page_title","Detail Pemesanan")

@section("title","Detail Pemesanan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item"><a href="/pemesanan">Pemesanan</a></li>
<li class="breadcrumb-item active">Detail Pemesanan</li>
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
        <h3 class="card-title"> DATA DETAIL PEMESANAN</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-header">
        <h5>Kode Pemesanan : {{$pemesanan->kode_pemesanan}}</h5>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Suplier</th>
                                <th>Nama Barang</th>
                                <th>Quantity</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $num = 1;
                            $total_harga = 0;
                            ?>
                            @foreach($detail_pemesanan as $data)
                            <tr>
                                <td>{{ $num++ }}</td>
                                <td>
                                    <b>{{$data->nama_suplier}}</b>
                                    <p>Alamat :</p>
                                    <p><b>{{$data->alamat_suplier}}</b></p>
                                </td>
                                <td>{{$data->nama_barang}}</td>
                                <td>{{$data->quantity}}</td>
                                <td>{{number_format($data->harga)}}</td>
                            </tr>
                            <?php $total_harga += $data->harga ?>
                            @endforeach
                            <tr>
                                <td colspan="4" align="right">Total Harga</td>
                                <td>{{$total_harga}}</td>
                            </tr>
                        </tbody>


                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <a href="/pemesanan" class="btn btn-outline-primary btn-sm">Kembali</a>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->

@endsection


@section('custom_script')
<!-- DataTables -->
<script src="{{asset ('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset ('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
@endsection