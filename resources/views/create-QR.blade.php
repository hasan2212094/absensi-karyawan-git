@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-success">
                <div class="card-header bg-success p-2 text-white bg-opacity-75 text-center">{{ __('Absen masuk') }}</div>

                <div class="card-body">
                <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR Scan Masuk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
     <div class="container col-lg-7 py-5">
       <!-- scanner -->
        <div class="card bg-white shadow rounded-3 p p-3 border-0">
        <!-- pesan -->
            @if (session()->has('gagal'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('gagal') }}</strong> 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('success') }}</strong> 
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

        <video id="preview"></video>
            <!-- from -->
            <form action="{{route('scan.store.masuk')}}" method="post" id="form">
                @csrf
                <input type="hidden" name="id_karyawan" id="id_karyawan">
            </form>
        </div>

    <!-- scanner -->
        <div class="table-responsive mt-5">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>nama</th>
                    <th>tanggal</th>
                    <th>jam masuk</th>
                    @foreach ($presensis as $presensi)
                    <tr>
                      <td>{{ $presensi->name->name}}</td>
                      <td>{{ $presensi->tanggal}}</td>
                      <td>{{ $presensi->jammasuk }}</td>
                    </tr>
                    @endforeach
                </tr>
            </table>
            <br>
            <a href="{{url('/')}}">
        <button type="submit"  class="btn btn-outline-success" >kembali</button>
    </a>
        </div>
     </div>

     <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
     <script type="text/javascript">
      let scanner = new Instascan.Scanner({ 
      video: document.getElementById('preview')
       });

      scanner.addListener('scan', function (content) {
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
      
      scanner.addListener('scan', function(c){
        document.getElementById('id_karyawan').value = c;
        document.getElementById('form').submit();
      })
    </script> 
    
    <script type="text/javascript" src="instascan.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
