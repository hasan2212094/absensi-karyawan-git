@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('profile Karyawan') }}</div>

                <div class="card-group m-auto">
                @foreach ($karyawan as $karya)
                                <div class="card m-3" style="width: 14rem;">
                                    <img class="card-img-top " src="{{ url('storage/' . $karya->image) }}">
                                    <div class="card-body">
                                     <h5 class="card-title  ">Nama: {{ $karya->name }}</h5>
                                     <h5 class="card-title ">NIK: {{ $karya->nik }}</h5>
                                    </div>
                                </div>
                @endforeach
                           
                </div>
                
                     <div class="">
                        <a href="{{url('/')}}">
                        <button type="submit" class="btn btn-outline-success">kembali</button>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection