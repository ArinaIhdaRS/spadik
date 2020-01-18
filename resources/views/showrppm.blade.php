@extends('layouts.app')

@section('title', 'RPPM')

@section('content')

Tema : @php echo DB::table('harian')->where('minggu', app('request')->input('minggu'))->first()->tema @endphp
<br>
Kelompok : @php echo DB::table('kelas')->where('id_users', Auth::id())->first()->namakelas @endphp
<br>
Semester/Minggu : {{app('request')->input('semester')}}/{{app('request')->input('minggu')}}
<br>

Kompetensi Dasar: @foreach($minggu as $mg) {{$mg->id_kompdasar}}, @endforeach
<br>
<table>
<thead>
    <th>Sub Tema</th>
    <th>Materi</th>
    <th>kegiatan</th>
</thead>
<tbody>
@foreach($minggu as $mg)
    <tr>
        <td>
            {{$mg->subtema}}
        </td>
        <td>
           @php                
                $materi = explode(',', $mg->id_materi);
           @endphp

           @foreach($materi as $mtr)
               @php
                    $kode = DB::table('materi')->where('kodemateri', $mtr)->first();
                    echo $kode->isimateri.'<br>';
               @endphp
           @endforeach
            
        </td>
        <td>
            @php
                $kegiatanHarian = DB::table('kegiatanharian')->where('id_harian', $mg->id)->get();
                foreach($kegiatanHarian as $hr)
                {
                    echo $hr->kegiatanharian.'<br>';
                }

                
            @endphp
        </td>
    </tr>
    @endforeach
</tbody>
</table>

@endsection