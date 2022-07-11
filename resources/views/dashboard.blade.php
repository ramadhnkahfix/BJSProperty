@extends('layout.mainlayout')

@section('page_title', ' Home')

@section('custom_css')
<style>
.center {
  text-align: center;
  border: 3px solid green;
}
.container {
  display: flex;
  justify-content: center;
}

/* Edit video */
#video {
  /* position: absolute; */
  top: 0;
  z-index: -1;
  overflow: hidden;
  width: 100%;
  height: 80vh;
  /* background: black no-repeat center center/cover; */
}
 
video {
  min-width: 100%;
  min-height: 80vh;
  z-index: 1;
}
 
.overlay {
  width: 100%;
  height: 100vh;
  position: absolute;
  top: 0;
  left: 0;
  /* background-color: rgba(8, 27, 11, 0.3); */
  z-index: 2;
}
</style>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{csrf_token()}}">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!-- Our CSS -->
<!-- <link rel="stylesheet" href="style.css"> -->
@endsection

@section('content')
<!-- Create video -->
<section id="video">
	<div class="overlay"></div>
		<!-- Ubah link dalam "src" sesuai video yang diinginkan -->
	<video width="420" height="315" src="{{asset ('asset/dist/video-header-1.mp4')}}" loop muted autoplay></video>     
</section><br>


@endsection

@section('custom_script')
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
@endsection