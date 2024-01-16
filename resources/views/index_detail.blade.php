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
          <form action="{{route('index_detail')}}" method="get"  class="container px-4">
              <div class="row pb-3 container px-4">
                <div class="col-md-4 ">
                <input name="keyword" type="text"  placeholder="ID karyawan" class="form_control"  >
                </div>
                <div class="col-md-2 ">
               <button type="submit" class="btn btn-primary btn-sm " style="width: 60px;">Search</button>
                </div>
          </form>
          <br><br>
          <form action="{{route('filter_detail')}}" method="get" >
              <div class="row pb-3">
                <div class="col-md-3">
                  <label>tanggal awal</label>
                  <input type="date" name="tanggal_awal" class="form_control" >
                </div>
                <div class="col-md-3">
                  <label>tanggal akhir</label>
                  <input type="date" name="tanggal_akhir" class="form_control" >
                </div>
                <div class="col-md-1 pt-4">
               <button type="submit" class="btn btn-primary btn-sm " style="width: 60px;">Search</button>
                </div>
             </div>
          </form>

          <br><br>
            <table class="table table-bordered table-hover " >
                <tr>
                    <th>nama</th>
                    <th>tanggal</th>
                    <th> masuk</th>
                    <th> pulang</th>
                    <th> lembur</th>
                    <th>total lembur</th>
                    <th>Action</th>
                    @foreach ( $presensis as $presensi)
                    <tr>
                      <td>{{ $presensi->name->name}}</td>
                      <td>{{ $presensi->tanggal}}</td>
                      <td>{{ $presensi->jammasuk }}</td>
                      <td>{{ $presensi->jamkeluar }}</td>
                      <td>{{ $presensi->jamlembur }}</td>
                      <td>{{ $presensi->jamkerja}}</td>
                      <td>
                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                      <form action="{{route('delete_presensis', $presensi)}}" method="post">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger mt-2"> Delete</button>
                      </form>
                      </div>
                      </td>
                        </tr>
                   

                    @endforeach
                </tr>
            </table>
            Total Asbensi karyawan : {{$presensis->total()}}
              {{$presensis->links('pagination::bootstrap-4')}}

                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
