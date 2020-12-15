<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataSiswa;
use Illuminate\Support\Facades\DB;
use App\Exports\CsvExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\ExceL;
use Illuminate\Support\Facades\Hash;
use Auth;
class DashboardController extends Controller
{

    public function beranda()
    {
      if(!auth()->user()){
        return redirect('/');
      }

        $prodi = DB::select("SELECT*FROM prodi");
        $tahun = DB::select("SELECT*FROM tahun_akademik order by kode_tahun_akademik ASC");
        return view('template/dashboard',['listprodi' => $prodi, 'tahun' => $tahun]);

    }
    public function testcsv()
    {
      if(!auth()->user()){
        return redirect('/');
      }
    	$data = User::all();
    	return view('template/testcsv', compact('data'));
    }
    public function csv_export()
    {

    	return ExceL::download(new CsvExport, 'sample.xlsx');
    }
    public function csv_import()
    {
    	ExceL::import(new UsersImport, request()->file('file'));
    	return back();
    }
    public function siswaBidikmisi()
    {
        return view('siswa/bidikmisi');
    }
    public function akun()
    {
      if(!auth()->user()){
        return redirect('/');
      }
      $data['listprodi'] = DB::select("SELECT*FROM prodi");
      $data['tahun'] = DB::select("SELECT*FROM tahun_akademik order by kode_tahun_akademik ASC");
      $data['user'] = User::all();
      return view('akun/index',$data);
    }
    public function store(Request $request)
    {
      if(!auth()->user()){
        return redirect('/');
      }
      $request->validate([
          'username' => 'required|unique:users|min:5',
          'nama' => 'required|min:5',
          'password' => 'required|min:5',
      ]);

      $akun = New User();
      $akun->username = $request->username;
      $akun->nama = $request->nama;
      $akun->role = $request->role;
      $akun->password = Hash::make($request->password);
      $akun->save();
      return redirect()->back()->with('status', 'Data User Berhasil Ditambahkan');
    }
    public function destroy($id)
    {
      if(!auth()->user()){
        return redirect('/');
      }
      $akun = User::where('id', $id);
      $akun->delete();
      return redirect()->back()->with('status', 'Data User Berhasil Dihapus');
    }
}
