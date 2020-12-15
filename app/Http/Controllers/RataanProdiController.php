<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TahunAkademik;
use App\RataanProdi;
use App\Imports\RataanProdiImport;
use Maatwebsite\Excel\Facades\ExceL;
class RataanProdiController extends Controller
{
  public function index(Request $request)
  {
    if(!auth()->user()){
      return redirect('/');
    }
    $p = $request->get('tahun_akademik');
    $data['tahun_akademik'] = TahunAkademik::pluck('tahun_akademik', 'kode_tahun_akademik');
    $data['tahun_akademik_pilihan'] = $p;

    $data['rataan'] = RataanProdi::all();
    return view('sbmptn.rataan_prodi', $data);
  }
  public function import(Request $request)
  {
    $d = $request->get('kode_tahun_akademik');
    $request->validate([
        'file' => 'required'
    ]);
    $a = ExceL::import(new RataanProdiImport($d), request()->file('file'));
    return redirect()->back()->with('sukses', 'Import Data Rataan Per Prodi Berhasil!');
  }
}
