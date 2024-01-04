<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Karyawan;
use App\Models\Masuk;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('index', ['karyawan' => $karyawan]);
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        return view('show', ['karyawan' => $karyawan]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|numeric',
            'name' => 'required',

        ]);
        Karyawan::create([
            'nik'=> $request->nik,
            'name' => $request->name,
        ]);
        return Redirect::route('index');

    }
}
