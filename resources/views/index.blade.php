@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border border-success ">
                <div class="card-header bg-success p-2 text-white bg-opacity-75 text-center">{{ __('Karyawan') }}</div>
                <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Active karyawan</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Item karyawan</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{url('/create')}}">Tambah karyawan baru</a></li>
      <li><a class="dropdown-item" href="{{url('/index/detail')}}">Detail absensi</a></li>
      <li><a class="dropdown-item" href="{{url('/profile/{karyawan}')}}">Profile karyawan</a></li>
    </ul>

    <br>
    <br>
    <table class="table table-bordered border-success container d_flex justify-content-center"  style="width: 20rem;">
        <tr>
            <th  class="text-center">NIK</th>
            <th  class="text-center">Nama</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach($karyawan as $karya)
            <tr>
                <td>{{$karya->nik}}</td>
                <td>{{$karya->name}}</td>
                <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <form action="{{route('edit_karyawan', $karya)}}" method="get" class="col-md-6">
                    @csrf
                     <button class="btn btn-primary" type="submit" >Edit</button>
                     </form>
                     <form action="{{route('delete_karyawan', $karya)}}" method="post" >
                     @method('delete')
                     @csrf
                    <button type="submit" class="btn btn-danger"> Delete</button>
                     </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <div class="btn-group container d_flex justify-content-center d-inline-flex gap-1" role="group" aria-label="Basic outlined example">
    <a href="{{url('/scan/create')}}">
     <button type="button" class="btn btn-outline-primary ">Absen Masuk</button>
     </a>
     <a href="{{url('/scan/create/pulang')}}">
      <button type="button" class="btn btn-outline-danger">Absen Pulang</button>
      </a>
      <a href="{{url('/scan/create/lembur')}}">
      <button type="button" class="btn btn-outline-warning">Absen Lembur</button>
      </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
