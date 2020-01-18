@extends('layouts.app')

@section('title', 'Data Rencana Pembelajaran')

@section('content')
    
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Beranda</li>
        </ol>
    </div><!--/.row-->
        
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Rencana Belajar</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Rencana Belajar
                    <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
                </div>
                <div class="panel-body">
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
                                        @can('isGuru')
                                        <a href="{{route('showrpph', $rpph->id)}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat</a>
                                        @endcan
                                        @can('isKepsek')
                                        <a href="{{route('showdatarpph', $rpph->id)}}" type="button" class="btn btn-sm btn-primary"><em class="fa fa-eye"></em> Lihat</a>
                                        @endcan
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