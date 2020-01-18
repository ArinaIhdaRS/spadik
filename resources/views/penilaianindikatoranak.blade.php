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
            <h1 class="page-header">Buat Penilaian Indikator</h1>
        </div>
	</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> Pilih Anak yang akan diberikan nilai Indikator. <a href="#" class="pull-right" data-dismiss="alert"><em class="fa fa-lg fa-close"></em></a></div>
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
                                <th class="column2">Nama Anak</th>
                                <th class="column3">Penilaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $key => $ssw)
                                <tr>
                                    <td class="column1">{{++$key}}</td>
                                    <td class="column2">{{$ssw->namalengkap}}</td>
                                    <td class="column6">
                                        <a href="{{route('showNilaiIndikator', ['id' => $rppharian->id, 'id_datasiswa' => $ssw->id])}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-plus"></em> Nilai</a>
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