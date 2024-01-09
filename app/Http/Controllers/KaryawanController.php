<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
                'image' => 'required'


            ]);

        $file = $request->file('image');
        $path = time(). '_' . $request->name . '.' . $file->getClientOriginalExtension();
        
        Storage::disk('local')->put('public/' . $path, file_get_contents($file));

           Karyawan::create([
                'nik'=> $request->nik,
                'name' => $request->name,
                'image' => $path
            ]);

            return Redirect::route('index');

        }

    public function edit_karyawan(Karyawan $karyawan)
    {
        return view('edit_karyawan', compact('karyawan'));
    }

     public function update_karyawan(Karyawan $karyawan, Request $request)

    { $request->validate([
        'nik' => 'required|numeric',
        'name' => 'required',
        'image' => 'required'

    ]);

    $file = $request->file('image');
    $path = time(). '_' . $request->name . '.' . $file->getClientOriginalExtension();
    
    Storage::disk('local')->put('public/' . $path, file_get_contents($file));


        $karyawan->update([
            'nik'=> $request->nik,
            'name' => $request->name,
            'image' => $path
         ]);
          return Redirect::route('index');
    }
    public function delete_karyawan(Karyawan $karyawan)
    {
        $karyawan->delete();
        return Redirect::route('index');
    }

    public function Profile_karyawan()
    {
        $karyawan = Karyawan::all();
        return view('profile_karyawan', ['karyawan' => $karyawan]);
    }

}
