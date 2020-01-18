@extends('layouts.app')

@section('title', 'Komponen - KIKD')

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
            <h1 class="page-header">Kompetensi Inti dan Dasar</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Kompetensi Inti
                    <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">Kode</th>
                                    <th class="column2">Kompetensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kompetensiinti as $ki)
                                    <tr>
                                        <td class="column1">{{ $ki->nomorkompinti}}</td>
                                        <td class="column2">{{ $ki->isikompetensiinti}}</td>
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

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><em class="fa fa-files-o">&nbsp;</em> Kompetensi Dasar</div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">Kode</th>
                                    <th class="column2">Nomor</th>
                                    <th class="column3">Kompetensi Dasar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kompetensidasar as $kdsr)
                                    <tr>
                                        <td class="column1"><b>{{$kdsr->nomorkompinti}}</b></td>
                                        <td class="column2">{{$kdsr->nomorkompdasar}}</td>
                                        <td class="column3">{{$kdsr->isikompetensidasar}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @can ('isAdmin')
                    <a href="" class="btn btn-primary pull-right"><em class="fa fa-pencil">&nbsp;</em> Edit</a>
                @endcan
                </div>
            </div>
        </div>
    </div>

@endsection