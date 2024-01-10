@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-success">
                <div class="card-header bg-success p-2 text-white bg-opacity-75">{{ __('New karyawan') }}</div>
                <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="{{url('/')}}">Kembali</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Item karyawan</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="{{url('/create')}}">Tambah karyawan baru</a></li>
      <li><a class="dropdown-item" href="{{url('/index/detail')}}">Detail absensi</a></li>
      <li><a class="dropdown-item" href="{{url('/profile/{karyawan}')}}">Profile karyawan</a></li>
    </ul>
</ul>
                <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                        <label class="container d_flex justify-content-center">NIK</label>
                        <input type="text" name="nik" placeholder="number nik" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="container d_flex justify-content-center">Nama</label>
                        <input type="text" name="name" placeholder="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="container d_flex justify-content-center">Foto</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <br><br>
                        <button type="submit" class="btn btn-outline-primary container d_flex justify-content-center " style="weight:10px">Tambah karyawan </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection