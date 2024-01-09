@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-success">
                <div class="card-header bg-success p-2 text-white bg-opacity-75 text-center">{{ __('Absen Detail') }}</div>

                <div class="card-body">
                <div class="table-responsive mt-30">
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
            <br>
            <a href="{{url('/')}}">
        <button type="submit" class="btn btn-outline-success">kembali</button>
    </a>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
