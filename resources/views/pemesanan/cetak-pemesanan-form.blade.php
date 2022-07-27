@extends("layout.mainlayout")

@section("page_title","Laporan Pemesanan")

@section("title","Laporan Pemesanan")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">Laporan Pemesanan</li>
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
    <h3 class="card-title"> DATA LAPORAN PEMESANAN</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>

  <div class="card-body">
    <div class="card-body">
      <div class="input-group mb-3">
        <label for="label">Tanggal Awal</label>
        <input type="date" name="tglawal" id="tglawal" class="form-control" />
      </div>
      <div class="input-group mb-3">
        <label for="label">Tanggal Akhir</label>
        <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
      </div>

      <div class="input-group mb-3">
        <a href="" onclick="this.href='/pemesanan/cetakPemesananPertanggal/'+ document.getElementById('tglawal').value +
                    '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-danger col-md-12">
          Cetak Laporan PDF <i class="fas fa-print"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->



@endsection


@section('scripts')
<!-- <script>
	function confirmDelete(id)
	{
		var link = document.getElementById('deleteLink')
		link.href="/pemesanan/hapus/" + id
		$('#deletepemesanan').modal('show')
	}


</script> -->
@endsection