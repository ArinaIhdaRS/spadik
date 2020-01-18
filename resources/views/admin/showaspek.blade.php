@extends('layouts.app')

@section('title', 'Komponen - Aspek')

@section('content')

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Data Siswa</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Aspek</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Aspek
                    <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                            <!-- <thead>
                                <tr class="">
                                    <th class="column1">Kode</th>
                                    <th class="column2">Aspek</th>
                                </tr>
                            </thead> -->
                            <tbody>
                            	<tr><th class="column1">Kode</th>
                                	@foreach($showaspek as $asp)
                                        <td class="column1"><b>{{ $asp->kodeaspek}}</b></td>
                                	@endforeach
                                </tr>
                                <tr><th class="column2">Aspek</th>
                                	@foreach($showaspek as $asp)        
                                    	<td class="column2">{{ $asp->namaaspek}}</td>
                                	@endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @can('isAdmin')
                    <a href="" class="btn btn-primary pull-right"><em class="fa fa-pencil">&nbsp;</em> Edit</a>
                @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ranah Aspek
                    <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">Kode Aspek</th>
                                    <th class="column2">Kode Ranah</th>
                                    <th class="column3">Isi Ranah</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach ($det_aspek as $daspek)
                            	<tr>
                            		<td class="column1">{{$daspek->kodeaspek}}</td>
                            		<td class="column2">{{$daspek->kodeisiranah}}</td>
                            		<td class="column3">{{$daspek->isiranah}}</td>
                            	</tr>
                            	@endforeach
                            </tbody>
                        </table>
                    </div>
                @can('isAdmin')
                    <a href="" class="btn btn-primary pull-right"><em class="fa fa-pencil">&nbsp;</em> Edit</a>
                @endcan
                </div>
            </div>
        </div>
    </div>

@endsection