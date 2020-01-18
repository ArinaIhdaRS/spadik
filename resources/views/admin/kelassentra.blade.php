@extends('layouts.app')

@section('title', 'Data Kelas - Sentra')

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
            <h1 class="page-header">Kelas dan Sentra</h1>
        </div>
    </div><!--/.row-->

    @if (\Session::has('success'))
    <div class="row">
        <div class="col-lg-12">
            <div class="alert bg-primary" role="alert"><em class="fa fa-lg fa-check-circle-o">&nbsp;</em> {{ \Session::get('success') }} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Kelas
                    <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    @can('isAdmin')
                    <div>
                        <a href="{{ route('tambahkelas') }}" class="btn btn-primary"><em class="fa fa-plus">&nbsp;</em> Tambah Data</a>
                    </div>
                    @endcan
                    <br>
                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">Nama Kelas</th>
                                    <th class="column2">Wali Kelas</th>
                                    @can('isAdmin')
                                    <th class="column3">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kelas as $kls)
                            	<tr>
                                    <td class="column1">{{$kls->namakelas}}</td>
                                    <td class="column2">{{$kls->user->nama}}</td>
                                    @can('isAdmin')
                                    <td class="column3">
                                        <a href="{{ route('editkelas', $kls->id) }}" class="btn btn-primary"><em class="fa fa-pencil"></em> </a>
                                        
                                        <a href="{{ route('deletekelas', $kls->id) }}" class="btn btn-primary"><em class="fa fa-trash"></em> </a>
                                    </td>      
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Sentra
                    <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
                    @can('isAdmin')
                    <div>
                        <a href="{{ route('tambahsentra') }}" class="btn btn-primary"><em class="fa fa-plus">&nbsp;</em> Tambah Data</a>
                    </div>
                    <br>
                    @endcan
                    <div class="table">
                        <table class="table fixed-table-container">
                            <thead>
                                <tr class="">
                                    <th class="column1">Nama Sentra</th>
                                    <th class="column2">Wali Kelas</th>
                                    @can('isAdmin')
                                    <th class="column3">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sentra as $sntr)
                                <tr>
                                    <td class="column1">{{$sntr->namasentra}}</td>
                                    <td class="column2">{{$sntr->user->nama}}</td>   
                                    @can('isAdmin')    
                                    <td class="column3">
                                        <a href="{{ route('editsentra', $sntr->id) }}" class="btn btn-primary"><em class="fa fa-pencil"></em> </a>
                                        <a href="{{ route('deletesentra', $sntr->id) }}" class="btn btn-primary"><em class="fa fa-trash"></em> </a>
                                    </td>
                                    @endcan
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