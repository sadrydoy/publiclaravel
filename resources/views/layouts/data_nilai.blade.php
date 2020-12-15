@extends('template/master')
@section('content')
<div class="container-fluid">

            <!-- Widgets -->
            <div class="row clearfix">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                    <div class="header">
                    <div class="block-header">
                        <h2>Data Nilai</h2>
                    </div>
                        <form action="{{url('/importDataNilai')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" required>
                            <br>
                            <button class="btn btn-success">Import CSV</button>
                        </form>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Pendaftaran</th>
                                        <th>Semester</th>
                                        <th>ID Kelas</th>
                                        <th>Kode Mata Pelajaran</th>
                                        <th>Nama Mata Pelajaran Kesetaraan</th>
                                        <th>Nilai Skala 4</th>
                                        <th>Nilai Skala 100</th>
                                        <th>Tahun Kur</th>
                                        <th>Basis</th>
                                        <th>Unit</th>
                                        <th>Remedial Skala 4</th>
                                        <th>Remedial Skala 100</th>
                                        <th>KKM</th>
                                        <th>Jam Equivalen</th>
                                        <th>Tahun Ambil</th>
                                        <th>Semester Ambil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                @foreach($data as $d)
                                    <tr>
                                        <th>{{$i}}</th>
                                        <td>{{$d->nomor_pendaftaran}}</td>
                                        <td>{{$d->semester}}</td>
                                        <td>{{$d->id_kelas}}</td>
                                        <td>{{$d->kode_mata_pelajaran}}</td>
                                        <td>{{$d->nama_mata_pelajaran_kesetaraan}}</td>
                                        <td>{{$d->nilai_skala_4}}</td>
                                        <td>{{$d->nilai_skala_100}}</td>
                                        <td>{{$d->tahun_kur}}</td>
                                        <td>{{$d->basis}}</td>
                                        <td>{{$d->unit}}</td>
                                        <td>{{$d->remedial_4}}</td>
                                        <td>{{$d->remedial_100}}</td>
                                        <td>{{$d->kkm}}</td>
                                        <td>{{$d->jam_equivalen}}</td>
                                        <td>{{$d->tahun_ambil}}</td>
                                        <td>{{$d->semester_ambil}}</td>
                                    </tr>
                                    <?php
                                    $i++
                                    ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

</div>
@endsection
