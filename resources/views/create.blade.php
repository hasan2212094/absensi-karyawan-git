@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border border-success">
                <div class="card-header bg-success p-2 text-white bg-opacity-75">{{ __('New karyawan') }}</div>

                <div class="card-body" >
                <form action="{{route('store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" placeholder="number nik" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" placeholder="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <br><br>
        <button type="submit" class="btn btn-outline-primary">Add</button>
    </form>
    <br>
     <a href="{{url('/')}}">
            <button type="submit" class="btn btn-outline-success">kembali ke halaman</button>
     </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection