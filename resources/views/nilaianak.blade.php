@extends('layouts.app')

@section('title', 'Nilai Anak')

@section('content')
	<div class="row">
		<ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Nilai Anak</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nilai Anak</h1>         
        </div>
	</div>

    

@foreach($siswa as $ssw)

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{$ssw->namalengkap}}</div>
                <div class="panel-body">
                    <div class="table">
                    <table class="table fixed-table-container">
                        <tbody>
                            <tr>
                                <td class="column1">Nilai Aspek</td>
                                <td class="column2">
                                    <a href="{{route('nilaiaspekanak', $ssw->id)}}?tanggalRPP={{$tanggal}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat Nilai</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="column1">Nilai Indikator</td>
                                <td class="column2">
                                    <a href="{{route('nilaiindikatoranak', $ssw->id)}}?tanggalRPP={{$tanggal}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat Nilai</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="column1">Nilai Ceklis</td>
                                <td class="column2">
                                    <a href="{{route('nilaiceklisanak', $ssw->id)}}?tanggalRPP={{$tanggal}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat Nilai</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="column1">Nilai Anekdot</td>
                                <td class="column2">
                                    <a href="{{route('nilaianekdotanak', $ssw->id)}}?tanggalRPP={{$tanggal}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat Nilai</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="column1">Nilai Hasil Karya</td>
                                <td class="column2">
                                    <a href="" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat Nilai</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="column1">Nilai Unjuk Karya</td>
                                <td class="column2">
                                    <a href="" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat Nilai</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection