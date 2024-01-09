@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border border-success ">
                <div class="card-header bg-success p-2 text-white bg-opacity-75 text-center">{{ __('Karyawan') }}</div>

                <div class="card-body">
                  <a href="{{url('/create')}}">
                     <button type="submit" class="btn btn-outline-success">add new</button>
                  </a>
                  <a href="{{url('/index/detail')}}">
                     <button type="submit" class="btn btn-outline-primary">detail</button>
                  </a>
                  <a href="{{url('/profile/{karyawan}')}}">
                     <button type="submit" class="btn btn-outline-info">profile</button>
                  </a>
    <br>
    <br>
    <br>
    <table class="table table-bordered border-success" style="width: 20rem;">
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
                    <form action="{{route('edit_karyawan', $karya)}}" method="get">
                    @csrf
                     <button class="btn btn-primary" type="submit" >Edit</button>
                     </form>
                     <form action="{{route('delete_karyawan', $karya)}}" method="post">
                     @method('delete')
                     @csrf
                    <button type="submit" class="btn btn-danger mt-2"> Delete</button>
                     </form>
                </td>
            </tr>
        @endforeach
    </table>
    <br>
    <div class="btn-group" role="group" aria-label="Basic outlined example">
    <a href="{{url('/scan/create')}}">
     <button type="button" class="btn btn-outline-primary">Absen Masuk</button>
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
