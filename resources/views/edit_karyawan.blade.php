@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit karyawan') }}</div>

                <div class="card-body">
                <form action="{{route('update_karyawan', $karyawan)}}" method="post">
                    @method('patch')
                    @csrf

                    <div class="form-group">
                        <label>NIK</label>
                        <input type="number" name="nik" placeholder="NIK" class="form-control" 
                        value="{{ $karyawan->nik}}">
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" placeholder="Nama" class="form-control" 
                        value="{{ $karyawan->name}}">
                    </div>
    
                    <button type="submit" class="btn btn-primary mt-3">Update data</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
