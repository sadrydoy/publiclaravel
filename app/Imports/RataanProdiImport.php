<?php

namespace App\Imports;

use App\RataanProdi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
class RataanProdiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function __construct($d)
    {
        $this->kode_tahun_akademik= $d;
        //dd($this->kode_tahun_akademik);
    }
    //public function startRow(): int
    //{
    //    return 1;
    //}
    public function model(array $row)
    {
        return new RataanProdi([
          'no' => $row['no'],
          'kode_prodi' => $row['kode_prodi'],
          'nama_prodi' => $row['nama_prodi'],
          'rataan' => $row['rataan'],
          'sbaku' => $row['sbaku'],
          'cov' => $row['cov'],
          'min' => $row['min'],
          'max' => $row['max'],
        ]);
    }
}
