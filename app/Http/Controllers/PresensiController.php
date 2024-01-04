<?php

namespace App\Http\Controllers;
use App\Models\Presensi;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;

class PresensiController extends Controller
{
    public function create()
    {
        return view('create-QR');
    }

    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now',new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');


        $cek = Presensi::where([
            'id_karyawan' => $request->id_karyawan,
            'tanggal' => $tanggal,
            'jammasuk' => $localtime

        ])->first();

        if ($cek){
            return redirect('/scan/create')->with('gagal', 'Anda Sudah Absen');
        }

        Presensi::create([
            'id_karyawan' => $request->id_karyawan,
            'tanggal' => $tanggal,
            'jammasuk' => $localtime
        ]);
        return redirect('/scan/create')->with('success','silahkan masuk');
    }
    
    public function index()
    {
        $presensis = Presensi::all();
        return view('create-QR', ['presensis' => $presensis]);
    }


    public function create_pulang()
    {
        return view('create_QR_pulang');
    }

    public function store_pulang(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now',new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');


        $cek = Presensi::where([
            'id_karyawan' => $request->id_karyawan,
            'tanggal' => $tanggal,
        ])->first();
        $dt=[
            'jamkeluar'=>$localtime
        ];

        if($cek->jamkelaur == ""){
            $cek->update($dt);
            return redirect('/scan/create/pulang')->with('gagal','sudah absen');
        }else{
            return redirect('/scan/create/pulang')->with('success','selamat pulanghati-hati di jalan ');
        }

    //    $presensi = Presensi::create([
    //         'id_karyawan' => $request->id_karyawan,
    //         'tanggal' => $tanggal,
    //     ]);
    //     $dt=[
    //         'jamkeluar'=>$localtime
    //     ];

    //     if($presensi->jamkelaur == ""){
    //         $presensi->update($dt);
    //         return redirect('/scan/create/pulang')->with('success','selamat pulanghati-hati di jalan ');
    //     };


    }
    
    public function index_pulang()
    {
        $presensis = Presensi::all();
        return view('create_QR_pulang', ['presensis' => $presensis]);
    }
}
