@extends('layouts.app')

@section('title', 'Rencana Pembelajaran Harian')

@section('content')
	<div class="row">
		<ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Rencana Belajar</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rencana Pembelajaran Harian</h1>
        </div>
	</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                    <div class="panel-heading">RPPH Hari Ini
                        <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
                        <div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Anda belum membuat RPPH untuk hari ini. <a href="{{ route('buatrpph')}}">Buat RPPH</a> <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                        <p></p>
                        <button type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Edit</button>
                        <button type="button" class="btn btn-sm btn-primary"><em class="fa fa-print"></em> Cetak</button>
                    </div>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Semua RPPH</div>
                <div class="panel-body">
                    <div>
                        <a href="{{ route('buatrpph')}}" type="button" class="btn btn-md btn-primary"><i class="fa fa-plus"></i>Tambah RPPH</a>
                    </div>
                    <br>
                    <div class="table">
                    <table class="table fixed-table-container">
                        <thead>
                            <tr class="">
                                <th class="column1">No</th>
                                <th class="column2">Hari/Tanggal</th>
                                <th class="column3">Semester/Minggu</th>
                                <th class="column4">Tema/Subtema</th>
                                <th class="column5">Status</th>
                                <th class="column6">Lengkap</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rppharian as $key => $rpph)
                                <tr>
                                    <td class="column1">{{++$key}}</td>
                                    <td class="column2">{{$rpph->tglpemb}}</td>
                                    <td class="column3">{{$rpph->semester}}/{{$rpph->minggu}}</td>
                                    <td class="column4">{{$rpph->tema}}/{{$rpph->subtema}}</td>
                                    <td class="column5">
                                        @if($rpph->statuspemb == NULL)
                                        Belum disetujui
                                        @else
                                        {{$rpph->statuspemb}}
                                        @endif
                                    </td>
                                    <td class="column6">
                                        <a href="{{route('showrpph', $rpph->id)}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection