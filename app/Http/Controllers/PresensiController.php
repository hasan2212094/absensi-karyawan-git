<?php

namespace App\Http\Controllers;
use App\Models\Presensi;

use App\Exports\PresensiExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
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
            'tanggal' => $tanggal
        ])->first();

        if ($cek) {
            return redirect('/scan/create')->with('gagal', 'Anda sudah absen');
        } else{
            Presensi::create([
                'id_karyawan' => $request->id_karyawan,
                'tanggal' => $tanggal,
                'jammasuk'=> $localtime
            ]);
            return redirect('/scan/create')->with('success', 'silahkan masuk, bila lembur absen pulang jam 06:30');
        }
        
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

        if($cek->jamkeluar == ""){
            $cek->update($dt);
             return redirect('/scan/create/pulang')->with('success','selamat pulang,bila lembur tolong absen lembur');
        }else{
            return redirect('/scan/create/pulang')->with('gagal','sudah absen');
        }

    }
    
    public function index_pulang()
    {
        $presensis = Presensi::all();
        return view('create_QR_pulang', ['presensis' => $presensis]);
    }



    public function create_lembur()
    {
        return view('create_QR_lembur');
    }

    public function store_lembur(Request $request)
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
            'jamlembur'=>$localtime,
            'jamkerja'=> date('H:i:s', strtotime($localtime) - strtotime($cek->jamkeluar) )
        ];

        if($cek->jamlembur == ""){
            $cek->update($dt);
             return redirect('/scan/create/lembur')->with('success','Terima kasih sudah lembur');
        }else{
            return redirect('/scan/create/lembur')->with('gagal','sudah absen');
        }

    }
    
    public function index_lembur()
    {
        $presensis = Presensi::all();
        return view('create_QR_lembur', ['presensis' => $presensis]);
    }

    public function index_detail(Request $request )
    {
        $keyword = $request->keyword;

        $presensis = Presensi::where('id_karyawan','LIKE', '%'.$keyword.'%')
          ->paginate(30);
        //   $presensis->withPath('presensi');
        //   $presensis->appends($request->all());
        return view('index_detail',compact('presensis','keyword'));
    }
    public function filter_detail(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $presensis = Presensi::whereDate('tanggal','>=',$tanggal_awal)
                             ->whereDate('tanggal','<=',$tanggal_akhir)
                             ->paginate();
        return view('index_detail',compact('presensis',));

    }

    public function delete_presensis(Presensi $presensis)
    {
        $presensis->delete();
        return Redirect::route('index_detail');
    }

    public function presensis_exports()
    {
        return Excel::download(new PresensiExport,'persensis.xlsx');
    }
   
}
