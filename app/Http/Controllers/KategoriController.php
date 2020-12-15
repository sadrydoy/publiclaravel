<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
      if(!auth()->user()){
        return redirect('/');
      }
      $data['listprodi'] = \DB::select("SELECT*FROM prodi");
      $data['tahun'] = \DB::select("SELECT*FROM tahun_akademik order by kode_tahun_akademik ASC");
      return view('itk/snmptn',$data);
    }
    public function index1()
    {
      if(!auth()->user()){
        return redirect('/');
      }
      return view('itk/sbmptn');
    }
}
