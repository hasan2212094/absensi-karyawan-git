<?php

namespace App\Exports;
use App\Models\Presensi;
use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PresensiExport implements FromArray, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
    * @return array
    */
    public function headings(): array
    {
       $headings = [];
       foreach( $this->data->toArray()[0] as $key => $value){
        $headings [] = Presensi::HEADINGS[$key];
       }
       return $headings;
    }

    /**
    * @return array
    */
    public function array(): array
    {
        return $this->data->toArray();
    }

    public function map($row): array
    {
        return [
            $row['id'],
            $row['id_karyawan'],
            $row['name'],
            $row['tanggal'],
            $row['jammasuk'],
            $row['jampulang'],
            $row['jamlembur'],
            $row['jamkerja']
        ];
    }
}
