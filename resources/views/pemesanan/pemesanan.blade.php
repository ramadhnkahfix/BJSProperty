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

  <div class="card-body">
  <div class="card-body">
    <div class="card">
			<div class="card-header">
				<a href="/pemesanan/addpemesanan">
				<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data</button>
				</a>

        <form action="" method="">
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <label for="">kolom</label>
        <input type = "number" id="col" min="1" max="5" value ="1">
        <label for="">baris</label>
        <input type = "number" id="row" min="1" max="7" value ="1">
        </form>
        <button id="generate" type="button" class="btn btn-secondary float-left" style="float: left; margin: 5px"><i class="fas fa-file-download"></i>  Cetak</button>
			</div>
      <?php
        $num = 1;
      ?>
      <div class="card-body">
      <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <!-- <th><input name="select_all" value="" id="example-select-all" type="checkbox" /></th> -->
                      <th style="width: 10px">No</th>
                      <th>Tgl Pemesanan </th>
                      <th>Nama Barang </th>
                      <th>Jumlah Barang</th>
                      <th>Harga Barang </th>
                      <th>Harga Total Barang </th>
                      <th>Aksi </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($pemesanan as $data)     
                      <tr> 
                         <td>{{ $num++ }}</td>
                         <td>{{$data->tgl_pemesanan}}</td> 
                         <td>{{$data->nama_barang}}</td> 
                         <td>{{$data->jml_barang}}</td>
                         <td>{{$data->harga_barang}}</td>
                         <td>{{$data->jml_barang * $data->harga_barang}}</td>
                         <td>
                            <a href='/pemesanan/editpemesanan/{{ $data->id_pemesanan }}' class="btn btn-danger"> 
                            <i class="fas fa-edit"></i> Edit</button>
                            </a> 

                          <button onclick="confirmDelete('{{ $data->id_pemesanan }}')" class="btn btn-danger">
                          <i class="fas fa-trash"></i> Hapus</button>
                          </td>
                      </tr> 
                  @endforeach

                  </tbody>

                  
                </table>
      </div>
    </div>

			<!-- /.card-body -->
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


@section('scripts')
<script>
	function confirmDelete(id)
	{
		var link = document.getElementById('deleteLink')
		link.href="/pemesanan/hapus/" + id
		$('#deletepemesanan').modal('show')
	}


</script>
@endsection
