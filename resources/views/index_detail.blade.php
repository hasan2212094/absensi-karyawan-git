@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-success">
                <div class="card-header bg-success p-2 text-white bg-opacity-75 text-center">{{ __('Absen Detail') }}</div>
                <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{url('/')}}">kembali</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Item karyawan</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{url('/create')}}">Tambah karyawan baru</a></li>
      <li><a class="dropdown-item" href="{{url('/index/detail')}}">Detail absensi</a></li>
      <li><a class="dropdown-item" href="{{url('/profile/{karyawan}')}}">Profile karyawan</a></li>
    </ul>
</ul>
<br><br>
            <table class="table table-bordered table-hover " >
                <tr>
                    <th>nama</th>
                    <th>tanggal</th>
                    <th> masuk</th>
                    <th> pulang</th>
                    <th> lembur</th>
                    <th>total lembur</th>
                    @foreach ( $presensis as $presensi)
                    <tr>
                      <td>{{ $presensi->name->name}}</td>
                      <td>{{ $presensi->tanggal}}</td>
                      <td>{{ $presensi->jammasuk }}</td>
                      <td>{{ $presensi->jamkeluar }}</td>
                      <td>{{ $presensi->jamlembur }}</td>
                      <td>{{ $presensi->jamkerja}}</td>
                    </tr>
                    @endforeach
                </tr>
            </table>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
