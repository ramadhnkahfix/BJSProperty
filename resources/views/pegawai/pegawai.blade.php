@extends("layout.mainlayout")

@section("page_title","Pegawai")

@section("title","Pegawai")

@section("breadcrumb")
<li class="breadcrumb-item"><a href="dashboard">Home</a></li>
<li class="breadcrumb-item active">Pegawai</li> 
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
	  <h3 class="card-title"> DATA PEGAWAI</h3>
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
				<a href="/pegawai/addpegawai">
				<button type="button" class="btn btn-info float-right" style="float: right;"><i class="fas fa-plus"></i>  Tambah Data</button>
				</a>
            </div>
      <?php
        $num = 1;
      ?>
      <div class="card-body">
      <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama Pegawai </th>
                      <th>Jenis Kelamin Pegawai </th>
                      <th>No. Telp </th>
                      <th>Alamat Pegawai </th>
                      <th>Status Pegawai </th>
                      <th>Aksi </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($pegawai as $data)     
                      <tr> 
                         <td>{{ $num++ }}</td>
                         <td>{{$data->nama_pegawai}}</td> 
                         <td>
                            @if ($data->jk_pegawai==0)
                                    laki-laki
                                    @else
                                      @if ($data->jk_pegawai==1) 
                                        perempuan
                                    @endif 
                                  @endif
                            </td>
                         <td>{{$data->no_telp}}</td>
                         <td>{{$data->alamat_pegawai}}</td>
                         <td>
                            @if ($data->status_pegawai==0)
                                    aktif
                                    @else
                                      @if ($data->status_pegawai==1) 
                                        nonaktif
                                    @endif 
                                  @endif
                            </td>
                         <td>
                            <a href='/pegawai/editpegawai/{{ $data->id_pegawai }}' class="btn btn-danger"> 
                            <i class="fas fa-edit"></i> Edit</button>
                            </a> 
                            
                          <!-- <button onclick="confirmDelete('{{ $data->id_pegawai }}')" class="btn btn-danger">
                          <i class="fas fa-trash"></i> Hapus</button> -->
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




<div class="modal fade" id="deletepegawai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
  $(function () {
	$("#example1").DataTable({
	  "responsive": true,
	  "autoWidth": false,
	});
  });
</script>
@endsection

@section('scripts')
<script>
	function confirmDelete(id)
	{
		var link = document.getElementById('deleteLink')
		link.href="/pegawai/hapus/" + id
		$('#deletepegawai').modal('show')
	}


</script>
@endsection