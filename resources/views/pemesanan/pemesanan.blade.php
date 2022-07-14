@extends("layout.mainlayout")

@section("page_title","Pemesanan")

@section("title","Pemesanan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">Pemesanan</li>
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
        <h3 class="card-title"> DATA PEMESANAN</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <?php
    $num = 1;
    ?>
    @if(session('success'))
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mx-5 mt-2 mb-0">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="card-body">
        <div class="card">
            <div class="card-header">
                <a href="/pemesanan/addpemesanan">
                    <button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i> Tambah Data</button>
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pemesanan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Total Harga</th>
                            <th>Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemesanan as $data)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td>{{$data->kode_pemesanan}}</td>
                            <td>{{date('d F Y', strtotime($data->tgl_pemesanan))}}</td>
                            <td>{{number_format($data->total_harga)}}</td>
                            <td>
                                <a href='/pemesanan/cetak-nota/{{ $data->id }}' target="_blank" class="btn btn-info">
                                    <i class="fas fa-download"></i> Download</button>
                                </a>
                                <a href='/pemesanan/detail/{{ $data->id }}' class="btn btn-primary">
                                    <i class="fas fa-eye"></i> Detail</button>
                                </a>
                                <button onclick="confirmDelete('{{ $data->id }}')" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->


<div class="modal fade" id="deletepemesanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a id="deleteLink">
                    <button type="button" class="btn btn-danger">Hapus</button>
                </a>
            </div>
        </div>
    </div>
</div>
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

@section('scripts')
<script>
    function confirmDelete(id) {
        var link = document.getElementById('deleteLink')
        link.href = "/pemesanan/hapus/" + id
        $('#deletepemesanan').modal('show')
    }
</script>
@endsection