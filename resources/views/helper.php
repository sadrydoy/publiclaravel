
@foreach($data as $d)
    <tr>
      <td>{{$loop->iteration}}</td>
        <th>

          <input type="checkbox"  id="checksiswa{{$d['nomor_pendaftaran']}}" name="siswacheck" value="{{$d['nomor_pendaftaran']}}" onchange="ambilsiswa({{$d['nomor_pendaftaran']}},{{$d['kode_program_studi']}},{{$tahun}})"  class="filled-in"

          @foreach($siswafinal as $s){
            @if($s->nomor_pendaftaran == $d['nomor_pendaftaran'] AND $s->kode_program_studi == $d['kode_program_studi'])
            checked
            @elseif($s->nomor_pendaftaran == $d['nomor_pendaftaran'] AND $s->kode_program_studi != $d['kode_program_studi'])
            disabled
            @endif
          @endforeach
          }
          />
        <label for="checksiswa{{$d['nomor_pendaftaran']}}"></label>

        </th>
        <td>{{$d['nama_siswa']}}</td>
        <td>{{$d['nomor_pendaftaran']}}</td>
        <td><?php echo number_format($d['total'],2,'.','');  ?></td>
        <td>{{$d['urutan_program_studi']}}</td>
        <td>{{$d['urutan_ptn']}}</td>
        <td>
          @foreach($siswafinal as $c)
            @foreach($prodiditerima as $pr)
            @if($c->nomor_pendaftaran == $d['nomor_pendaftaran'])
              @if($c->kode_program_studi == $pr->kode_prodi)
              <span class="text-success">Diterima di {{$pr->nama_prodi}}</span>
              @endif
            @endif
            @endforeach
          @endforeach
        </td>

    </tr>
@endforeach
