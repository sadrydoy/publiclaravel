<?php

namespace App\Http\Controllers;
use App\DataNIlai;
use Illuminate\Http\Request;
use App\Imports\DataNilaiImport;
use Maatwebsite\Excel\Facades\ExceL;
class DataNilaiController extends Controller
{
    public function __construct()
    {
        set_time_limit(8000000);
    }
    public function index()
    {
      if(!auth()->user()){
        return redirect('/');
      }
        $data = DataNIlai::paginate(1000);
        return view('layouts/data_nilai', compact('data'));
    }
    public function import()
    {
    	ExceL::import(new DataNilaiImport, request()->file('file'));
    	return back();
    }
}
