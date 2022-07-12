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
              <select class="custom-select form-control-border" name="nama_barang" required>
                <option readonly>-- Pilih Barang --</option>
              </select>
              <p class="small-text"><small style="color: red;"> *pilih supplier terlebih dahulu</small></p>
            </div>
            <div class="form-group">
              <label>Jumlah Barang</label>
              <input type="number" name="jml_barang" class="form-control form-control-border" placeholder="Masukkan Jumlah Barang" readonly>
              <p class="mini-text"><small style="color: red;"> *pilih barang terlebih dahulu</small></p>
            </div>
            <div class="form-group">
              <label>Harga Barang</label>
              <div class="harga">
                <input type="number" name="harga_barang" class="form-control form-control-border" placeholder="Masukkan Harga Barang" readonly>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" id="buttonInsertDetail" class="btn btn-primary btn-block">Tambah</button>
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
              <input type="text" class="form-control form-control-border" name="kode_pemesanan" value="{{$kode_pemesanan}}" readonly>
            </div>
            <div class="form-group">
              <label>Tanggal Pembelian</label>
              <input type="date" name="tgl_penerimaan" class="form-control" value="{{old('tgl_penerimaan') }}">
            </div>
            <div class="form-group">
              <label>Supplier</label>
              <select class="custom-select form-control-border" name="supplier">
                <option readonly>--Pilih Supplier--</option>
                @foreach($supliers as $suplier)
                <option value="{{$suplier->id_suplier}}">{{$suplier->nama_suplier}}</option>
                @endforeach
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
          @if(Session::has('error'))
          <div class="alert alert-warning">
            {{Session::get('error')}}
          </div>
          @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th></th>
                <th>Nomor</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Stok Barang</th>
                <th width="25%">Harga Barang</th>
              </tr>
            </thead>
            <tbody class="data-barang">

            </tbody>
            <tfoot>
              <tr style="font-weight:bold;">
                <td colspan="5" align="right">Total Harga</td>
                <td>
                  <div class="total-harga">0</div>
                </td>
              </tr>
              <tr hidden>
                <td colspan="6" align="right" class="p-5">
                  <form action="{{route('insertpemesanan')}}" method="post">
                    @csrf
                    <div class="input-submit">
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitForm">Submit</button>
                  </form>
                </td>
              </tr>
            </tfoot>
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
  // Get Supplier
  $(document).ready(function() {
    $('select[name="supplier"]').on('change', function() {
      let supplierId = $(this).val();
      if (supplierId) {
        jQuery.ajax({
          url: '/getBarang/' + supplierId,
          type: "GET",
          dataType: "json",
          success: function(data) {
            $('select[name="nama_barang"]').empty();
            $('.small-text').hide();
            $.each(data, function(key, value) {
              $('select[name="nama_barang"]').append('<option value="' + value['id_barang'] + '">' + value['nama_barang'] + '</option>');
            });
          },
        });
      } else {
        $('select[name="nama_barang"]').empty();
      }
    });
    // Get Barang 
    $('select[name="nama_barang"]').on('click', function() {
      let barangID = $(this).val();
      if (barangID) {
        jQuery.ajax({
          url: '/getBarangDetail/' + barangID,
          type: "GET",
          dataType: "json",
          success: function(data) {
            $('input[name="jml_barang"]').removeAttr('readonly');
            $('.mini-text').hide();
            $('.harga').empty();
            $('input[name="jml_barang"]').empty();
            // console.log(data);
            $.each(data, function(key, value) {
              $('.harga').append('<input value="' + value['harga_barang'] + '" name="harga_barang" type="number" class="form-control form-control-border" required readonly>');
            });
          },
        });
      } else {
        $('.harga').empty();
      }
    });
  });
  // Post to Detail
  $(document).ready(function() {
    $('#buttonInsertDetail').on('click', function(e) {
      e.preventDefault();

      let token = $('meta[name="csrf-token"]').attr('content');
      let kode_pemesanan = $('input[name="kode_pemesanan"]').val();
      let tgl = $('input[name="tgl_penerimaan"]').val();
      let supplier = $('input[name="supplier"]').val();
      let nama_barang = $('select[name="nama_barang"]').val();
      let qty = $('input[name="jml_barang"]').val();
      let harga = $('input[name="harga_barang"]').val();

      jQuery.ajax({
        url: "/pemesanan/insert",
        dataType: "JSON",
        type: "POST",
        data: {
          _token: token,
          kode_pemesanan: kode_pemesanan,
          tgl_pemesanan: tgl,
          supplier: supplier,
          nama_barang: nama_barang,
          quantity: qty,
          harga_barang: harga,
        },
        success: function(data) {
          num = 1;
          total_harga = 0;
          $('.data-barang').empty();
          $('.total-harga').empty();
          $.each(data, function(key, value) {
            $('.data-barang').append('<tr><td><button type="button" class="btn btn-danger btn-sm" onclick="DeleteFunction(' + value['id'] + ')">Delete</button></td><td> Barang ke-' + num++ + '</td><td>' + value['nama_barang'] + '</td><td>'+value['quantity']+'</td><td>'+value['jml_barang']+'</td><td>' + commaSeparateNumber(value['harga']) + '</td></tr>')
            $('.input-submit').append('<input name="id_pemesanan" value="'+value['pemesanan_id']+'" hidden>');
            total_harga += value['harga'];
          });
          $('.total-harga').html(commaSeparateNumber(total_harga));
          $('.input-submit').append('<input name="total_harga" value="'+total_harga+'" hidden>')
          $('tfoot tr:last').removeAttr('hidden');
        },
        error: function(data) {
          console.log('Error:', data);
          alert('Something Wrong');
        }
      });
    });
  });

  // Delete Detail
  function DeleteFunction(id) {

    let token = $('meta[name="csrf-token"]').attr('content');
    jQuery.ajax({
      url: "/pemesanan/delete/" + id,
      dataType: "JSON",
      type: "patch",
      data: {
        _token: token,
        id: id
      },
      success: function(data) {
        num = 1;
        total_harga = 0;
        $('.data-barang').empty();
        $('.total-harga').empty();
        $.each(data, function(key, value) {
          $('.data-barang').append('<tr><td><button type="button" class="btn btn-danger btn-sm" onclick="DeleteFunction(' + value['id'] + ')">Delete</button></td><td> Barang ke-' + num++ + '</td><td>' + value['nama_barang'] + '</td><td>' + value['quantity'] + '</td><td>'+value['jml_barang']+'</td><td>' + commaSeparateNumber(value['harga']) + '</td></tr>')
          $('.input-submit').append('<input name="id_pemesanan" value="'+value['pemesanan_id']+'" hidden>');
          total_harga += value['harga'];
        });
        $('.total-harga').html(commaSeparateNumber(total_harga));
        $('.input-submit').append('<input name="total_harga" value="'+total_harga+'" hidden>')
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