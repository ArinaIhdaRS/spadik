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
            <h1 class="page-header">Nilai Indikator Anak</h1>
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
                                    <td class="column1">Kompetensi Dasar</td>
                                    <td class="column1">Indikator</td>
                                    <td class="column1">Aspek</td>
                                    <td class="column1">Nilai Indikator</td>
                                </tr>                                
                                <tr>                                    
                                    <td class="column2">{{$nilai->kompetensidasar}}</td>
                                    <td class="column2">{{$nilai->indikator}}</td>
                                    <td class="column2">{{$nilai->id_aspek}}</td>
                                    <td class="column2">{{$nilai->nilaiindikator}}</td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection