@extends('layouts.app')

@section('title', 'Penilaian Anak Didik')

@section('content')
	<div class="row">
		<ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Penilaian Anak</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Penilaian Anak Didik</h1>
        </div>
	</div>

	<!-- anak didik --
	<div class="row">
        <div class="col-md-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    Data Anak Didik
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">NISN</th>
                                    <th class="column2">Nama</th>
                                    <th class="column6">Lengkap</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $ssw)
                                    <tr>
                                        <td class="column1">{{$ssw->nisn}}</td>
                                        <td class="column2">{{$ssw->namalengkap}}</td>
                                        <td class="column6">
                                        	<a href="{{route('showdatasiswa', $ssw->id)}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat</a>
                                    	</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>                            
	</div> -->

@foreach ($kegiatanharian as $key => $kgt)

@php
    $kegiatan = DB::table('nilaiaspek')->where('id_kegiatanharian', $kgt->id)->get();
@endphp

	<div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
            	<div class="panel-heading">
                    Kegiatan RPPH {{$rppharian->tglpemb}} 
                    <span><a href="{{route('nilaiaspekkegiatan', $kgt->id)}}" type="button" class="btn btn-info pull-right"><em class="fa fa-check"></em> Nilai</a></span>
                </div>
                <div class="panel-body">
                    <p>{{$kgt->kegiatanharian}}</p>
                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th rowspan="2" class="column1">Nama</th>
                                    <th colspan="7"  class="column2"> Nilai
                                        <tr>
                                            @foreach($aspek as $asp)
                                            <th class="column2">{{$asp->kodeaspek}}</th>
                                            @endforeach
                                        </tr>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($siswa as $ssw)

                                @php
                                    $nilaisiswa = DB::table('nilaiaspek')->where('id_datasiswa', '=', $ssw->id)->get();
                                @endphp
                                <tr>
                                    <td class="column1">{{$ssw->namalengkap}}</td>
                                    <td class="column2">{{$nilaisiswa->nilaiaspk}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection