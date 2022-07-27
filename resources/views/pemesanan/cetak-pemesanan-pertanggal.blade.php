<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LAPORAN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('asset/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('asset/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('asset/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('asset/dist/css/AdminLTE.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body onload="window.print();">
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laporan Data Pemesanan</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{asset('asset/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset('asset/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('asset/dist/css/AdminLTE.min.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    </head>

    <body onload="window.print();">
        <div class="wrapper">
            <!-- Main content -->
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> Laporan Data Pemesanan
                            <small class="pull-right"><b>Date: {{ date('D-d-M-Y')}}</b></small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pemesanan</th>
                                    <th>Tanggal Pemesanan </th>
                                    <th>Detail Pemesanan</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                use App\Models\DetailPemesanan;

                                $no = 1 ?>
                                @foreach ($cetakpertanggal as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$data->kode_pemesanan}}</td>
                                    <td>{{date('d F Y', strtotime($data->tgl_pemesanan))}}</td>
                                    <td>
                                        <?php
                                        $detail_penerimaan = DetailPemesanan::select('detail_pemesanans.*', 'barang.nama_barang', 'barang.jml_barang')
                                            ->join('barang', 'barang.id_barang', '=', 'detail_pemesanans.barang_id')
                                            ->where('pemesanan_id', $data->id)->where('deleted_at', null)->get()
                                        ?>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Barang</th>
                                                    <th>Quantity</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($detail_penerimaan as $details)
                                                <tr>
                                                    <td>{{$details->nama_barang}}</td>
                                                    <td>{{$details->quantity}}</td>
                                                    <td>{{$details->harga}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>{{$data->total_harga}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- ./wrapper -->
    </body>

    </html>

    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
    </section>
    <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>