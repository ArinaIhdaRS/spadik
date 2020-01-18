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
            <h1 class="page-header">Buat Penilaian Aspek Anak</h1>
        </div>
	</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Pilih Kegiatan dari RPPH untuk membuat Penilaian Aspek. <a href="#" class="pull-right" data-dismiss="alert"><em class="fa fa-lg fa-close"></em></a></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">Semua RPPH</div> -->
                <div class="panel-body">
                    <div class="table">
                    <table class="table fixed-table-container">
                        <thead>
                            <tr class="">
                                <th class="column1">No</th>
                                <th class="column2">Tahapan</th>
                                <th class="column3">Waktu</th>
                                <th class="column4">Kegiatan</th>
                                <th class="column5">Media</th>
                                <th class="column6">Penilaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rpphkgt as $key => $kegiatan)
                                <tr>
                                    <td class="column1">{{++$key}}</td>
                                    <td class="column2">{{$kegiatan->tahapanharian}}</td>
                                    <td class="column3">{{$kegiatan->waktuharian}}</td>
                                    <td class="column4">{{$kegiatan->kegiatanharian}}</td>
                                    <td class="column5">{{$kegiatan->mediaharian}}</td>
                                    <td class="column6">
                                        <a href="{{route('nilaiaspekkegiatan', $kegiatan->id)}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-plus"></em> Nilai</a>
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