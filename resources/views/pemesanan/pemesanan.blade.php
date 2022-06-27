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
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-md-7">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Barang</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" name="nama_barang" class="form-control form-control-border" placeholder="Masukkan Nama Barang">
            </div>
            <div class="form-group">
              <label>Satuan</label>
              <select class="custom-select form-control-border" name="satuan">
                <option>--Pilih Satuan--</option>
                <option>Kg</option>
                <option>Matt</option>
                <option>Watt</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jumlah Barang</label>
              <input type="number" name="jml_barang" class="form-control form-control-border" placeholder="Masukkan Jumlah Barang">
            </div>
            <div class="form-group">
              <label>Harga Barang</label>
              <input type="number" name="harga_barang" class="form-control form-control-border" placeholder="Masukkan Harga Barang">
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-block">Tambah</button>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Supplier</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label>Kode Pembelian</label>
              <input type="text" class="form-control form-control-border" value="PEM003" readonly>
            </div>
            <div class="form-group">
              <label>Tanggal Pembelian</label>
              <input type="text" class="form-control form-control-border" placeholder="dd/mm/yy">
            </div>
            <div class="form-group">
              <label>Supplier</label>
              <select class="custom-select form-control-border" name="satuan">
                <option>--Pilih Supplier--</option>
                <option>Konn</option>
                <option>Matt</option>
                <option>Watt</option>
              </select>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
    <!-- Row Tabel -->
    <div class="row-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Pemesanan</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>User</th>
                <th>Date</th>
                <th>Status</th>
                <th>Reason</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>183</td>
                <td>John Doe</td>
                <td>11-7-2014</td>
                <td><span class="tag tag-success">Approved</span></td>
                <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- End Row Tabel -->
  </div>
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


@section('scripts')
<script>
  function confirmDelete(id) {
    var link = document.getElementById('deleteLink')
    link.href = "/pemesanan/hapus/" + id
    $('#deletepemesanan').modal('show')
  }
</script>
@endsection