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
            <h1 class="page-header">Nilai Ceklis Anak</h1>
        </div>
	</div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                        <tbody>
                            <tr>                                
                                <td rowspan="2">Kompetensi Dasar</td>
                                <td rowspan="2">Indikator</td>
                                <td colspan="4">Hasil Penilaian</td>
                            </tr>
                            <tr>
                                <td>BB</td>
                                <td>MB</td>
                                <td>BSH</td>
                                <td>BSB</td>
                            </tr>
                            @foreach($nilaiindikator as $nilai)
                            <tr>                                
                                <td>{{$nilai->kompetensidasar}}</td>
                                <td>{{$nilai->indikator}}</td>
                                <td>@if($nilai->nilaiindikator <= 25 && $nilai->nilaiindikator > 0) V @endif</td>
                                <td>@if($nilai->nilaiindikator <= 50 && $nilai->nilaiindikator > 25) V @endif</td>
                                <td>@if($nilai->nilaiindikator <= 75 && $nilai->nilaiindikator > 50) V @endif</td>
                                <td>@if($nilai->nilaiindikator <= 100 && $nilai->nilaiindikator > 75) V @endif</td>                                
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